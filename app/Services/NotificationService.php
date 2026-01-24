<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use App\Models\SystemSetting;
use App\Models\NotificationProvider;
use App\Models\DeviceToken;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class NotificationService
{
    protected $smsUsername;
    protected $smsPassword;
    protected $smsFrom;
    protected $smsUrl;
    protected $smsProvider;
    protected $emailProvider;

    public function __construct()
    {
        try {
            // Get primary providers from database
            $this->smsProvider = NotificationProvider::getPrimary('sms');
            $this->emailProvider = NotificationProvider::getPrimary('email');
            
            // Fallback to SystemSetting if no provider found
            if ($this->smsProvider) {
                $this->smsUsername = $this->smsProvider->sms_username;
                $this->smsPassword = $this->smsProvider->sms_password;
                $this->smsFrom = $this->smsProvider->sms_from;
                $this->smsUrl = $this->smsProvider->sms_url;
            } else {
                // Fallback to SystemSetting, then env
                $this->smsUsername = SystemSetting::getValue('sms_username') ?: env('SMS_USERNAME', '');
                $this->smsPassword = SystemSetting::getValue('sms_password') ?: env('SMS_PASSWORD', '');
                $this->smsFrom = SystemSetting::getValue('sms_from') ?: env('SMS_FROM', 'ICCR TZ');
                $this->smsUrl = SystemSetting::getValue('sms_url') ?: env('SMS_URL', '');
            }
        } catch (\Exception $e) {
            // Table might not exist yet, use fallback
            Log::warning('NotificationProvider table not available, using SystemSetting fallback: ' . $e->getMessage());
            $this->smsUsername = SystemSetting::getValue('sms_username') ?: env('SMS_USERNAME', '');
            $this->smsPassword = SystemSetting::getValue('sms_password') ?: env('SMS_PASSWORD', '');
            $this->smsFrom = SystemSetting::getValue('sms_from') ?: env('SMS_FROM', 'ICCR TZ');
            $this->smsUrl = SystemSetting::getValue('sms_url') ?: env('SMS_URL', '');
        }
    }

    /**
     * Send SMS using GET or POST method
     */
    public function sendSMS(string $phoneNumber, string $message, ?NotificationProvider $provider = null)
    {
        try {
            // Use provided provider or fallback to default
            $provider = $provider ?? $this->smsProvider;
            
            if ($provider) {
                $smsUsername = $provider->sms_username;
                $smsPassword = $provider->sms_password;
                $smsFrom = $provider->sms_from;
                $smsUrl = $provider->sms_url;
            } else {
                $smsUsername = $this->smsUsername;
                $smsPassword = $this->smsPassword;
                $smsFrom = $this->smsFrom;
                $smsUrl = $this->smsUrl;
            }

            // For API v2, only URL and password (Bearer token) are required
            $isV2Api = strpos($smsUrl, '/api/sms/v2') !== false;
            $requiredFieldsMissing = empty($smsUrl) || empty($smsPassword) || (!$isV2Api && empty($smsUsername));
            
            if ($requiredFieldsMissing) {
                $errorMsg = 'SMS configuration incomplete: Missing required credentials';
                Log::warning('SMS configuration incomplete', [
                    'has_url' => !empty($smsUrl),
                    'has_username' => !empty($smsUsername),
                    'has_password' => !empty($smsPassword),
                ]);
                
                // Log to ActivityLog
                try {
                    \App\Models\ActivityLog::create([
                        'user_id' => \Illuminate\Support\Facades\Auth::id(),
                        'action' => 'sms_error',
                        'model_type' => 'SMS',
                        'description' => $errorMsg . ' - URL: ' . ($smsUrl ?: 'missing') . ', Username: ' . ($smsUsername ?: 'missing'),
                        'ip_address' => request()->ip(),
                    ]);
                } catch (\Exception $e) {
                    // Fail silently if ActivityLog fails
                }
                
                return false;
            }

            // Validate phone number format
            $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
            
            if (empty($phoneNumber) || !preg_match('/^255[0-9]{9}$/', $phoneNumber)) {
                // Try to fix format if not already in correct format
                if (!str_starts_with($phoneNumber, '255')) {
                    $phoneNumber = '255' . ltrim($phoneNumber, '0');
                }
                
                // Validate again after formatting
                if (!preg_match('/^255[0-9]{9}$/', $phoneNumber)) {
                    $errorMsg = "SMS sending failed: Invalid phone number format. Expected: 255XXXXXXXXX, Got: {$phoneNumber}";
                    Log::error('SMS sending failed: Invalid phone number format', [
                        'phone' => $phoneNumber,
                        'expected_format' => '255XXXXXXXXX'
                    ]);
                    
                    // Log to ActivityLog
                    try {
                        \App\Models\ActivityLog::create([
                            'user_id' => \Illuminate\Support\Facades\Auth::id(),
                            'action' => 'sms_error',
                            'model_type' => 'SMS',
                            'description' => $errorMsg,
                            'ip_address' => request()->ip(),
                        ]);
                    } catch (\Exception $e) {
                        // Fail silently if ActivityLog fails
                    }
                    
                    return false;
                }
            }

            Log::info('Attempting to send SMS', [
                'phone' => $phoneNumber,
                'message' => substr($message, 0, 50) . (strlen($message) > 50 ? '...' : ''),
                'url' => $smsUrl,
                'from' => $smsFrom
            ]);

            // Check if URL contains '/api/sms/v2' or '/api/sms/v1' - use Bearer token auth
            // Otherwise check for '/link/sms/v1' or '/api/' - use Basic Auth
            $useBearerToken = strpos($smsUrl, '/api/sms/v2') !== false || strpos($smsUrl, '/api/sms/v1') !== false;
            $usePostMethod = $useBearerToken || 
                           strpos($smsUrl, '/link/sms/v1') !== false || 
                           strpos($smsUrl, '/api/') !== false;
            
            $curl = curl_init();
            
            if ($usePostMethod) {
                if ($useBearerToken) {
                    // Use Bearer token authentication (API v2 format)
                    // API Key is used as Bearer token
                    $bearerToken = $smsPassword ?: $smsUsername; // Use password as token, or username if password not set
                    
                    $body = json_encode([
                        'from' => $smsFrom,
                        'to' => $phoneNumber,
                        'text' => $message,
                        'flash' => 0,
                        'reference' => 'iccr_tz_' . time()
                    ]);
                    
                    Log::debug('SMS API Request (POST with Bearer Token)', [
                        'url' => $smsUrl,
                        'method' => 'POST',
                        'from' => $smsFrom,
                        'to' => $phoneNumber,
                    ]);
                    
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $smsUrl,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => $body,
                        CURLOPT_HTTPHEADER => [
                            'Authorization: Bearer ' . $bearerToken,
                            'Content-Type: application/json',
                            'Accept: application/json'
                        ],
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => 0,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_USERAGENT => 'ICCR-TZ-SMS-Client/1.0'
                    ));
                } else {
                    // Use POST method with JSON body and Basic Auth (legacy v1)
                    $auth = base64_encode($smsUsername . ':' . $smsPassword);
                    
                    $body = json_encode([
                        'from' => $smsFrom,
                        'to' => $phoneNumber,
                        'text' => $message,
                        'reference' => 'iccr_tz_' . time()
                    ]);
                    
                    Log::debug('SMS API Request (POST with Basic Auth)', [
                        'url' => $smsUrl,
                        'method' => 'POST',
                        'from' => $smsFrom,
                        'to' => $phoneNumber,
                    ]);
                    
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $smsUrl,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => $body,
                        CURLOPT_HTTPHEADER => [
                            'Authorization: Basic ' . $auth,
                            'Content-Type: application/json',
                            'Accept: application/json'
                        ],
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => 0,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_USERAGENT => 'ICCR-TZ-SMS-Client/1.0'
                    ));
                }
            } else {
                // Use GET method with URL parameters (legacy support)
                $text = urlencode($message);
                $password = urlencode($smsPassword);
                
                $url = $smsUrl . 
                       '?username=' . urlencode($smsUsername) . 
                       '&password=' . $password . 
                       '&from=' . urlencode($smsFrom) . 
                       '&to=' . $phoneNumber . 
                       '&text=' . $text;
                
                Log::debug('SMS API Request (GET)', [
                    'url' => $url,
                    'method' => 'GET',
                    'from' => $smsFrom,
                    'to' => $phoneNumber
                ]);
                
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_USERAGENT => 'ICCR-TZ-SMS-Client/1.0'
                ));
            }

            $response = curl_exec($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $curlError = curl_error($curl);
            $curlErrno = curl_errno($curl);

            Log::info('SMS Response', [
                'http_code' => $httpCode,
                'response' => substr($response ?? '', 0, 200)
            ]);

            if ($curlErrno) {
                $errorMsg = "SMS cURL Error ({$curlErrno}): {$curlError}";
                Log::error('SMS cURL Error', [
                    'error_code' => $curlErrno,
                    'error_message' => $curlError,
                    'phone' => $phoneNumber,
                ]);
                
                // Log to ActivityLog
                try {
                    \App\Models\ActivityLog::create([
                        'user_id' => \Illuminate\Support\Facades\Auth::id(),
                        'action' => 'sms_error',
                        'model_type' => 'SMS',
                        'description' => $errorMsg . ' - Phone: ' . $phoneNumber,
                        'ip_address' => request()->ip(),
                    ]);
                } catch (\Exception $e) {
                    // Fail silently if ActivityLog fails
                }
                
                curl_close($curl);
                return false;
            } else {
                curl_close($curl);
                
                // Check if SMS was sent successfully
                if ($httpCode == 200) {
                    $responseLower = strtolower($response ?? '');
                    $responseData = json_decode($response, true);
                    
                    if (strpos($responseLower, 'success') !== false || 
                        strpos($responseLower, '200') !== false ||
                        strpos($responseLower, 'accepted') !== false ||
                        strpos($responseLower, 'sent') !== false ||
                        ($responseData !== null && isset($responseData['success']) && $responseData['success']) ||
                        ($responseData !== null && !isset($responseData['error']))) {
                        
                        Log::info('SMS sent successfully', [
                            'phone' => $phoneNumber,
                        ]);
                        return true;
                    } else {
                        $errorMsg = 'SMS API returned 200 but content indicates failure. Response: ' . substr($response ?? '', 0, 200);
                        Log::warning('SMS API returned 200 but content indicates failure', [
                            'phone' => $phoneNumber,
                            'response' => substr($response ?? '', 0, 200),
                        ]);
                        
                        // Log to ActivityLog
                        try {
                            \App\Models\ActivityLog::create([
                                'user_id' => \Illuminate\Support\Facades\Auth::id(),
                                'action' => 'sms_error',
                                'model_type' => 'SMS',
                                'description' => $errorMsg . ' - Phone: ' . $phoneNumber,
                                'ip_address' => request()->ip(),
                            ]);
                        } catch (\Exception $e) {
                            // Fail silently if ActivityLog fails
                        }
                        
                        return false;
                    }
                } else {
                    $errorMsg = "SMS failed with HTTP code {$httpCode}. Response: " . substr($response ?? '', 0, 200);
                    Log::error('SMS failed with HTTP code', [
                        'http_code' => $httpCode,
                        'response' => substr($response ?? '', 0, 200),
                        'phone' => $phoneNumber,
                    ]);
                    
                    // Log to ActivityLog
                    try {
                        \App\Models\ActivityLog::create([
                            'user_id' => \Illuminate\Support\Facades\Auth::id(),
                            'action' => 'sms_error',
                            'model_type' => 'SMS',
                            'description' => $errorMsg . ' - Phone: ' . $phoneNumber,
                            'ip_address' => request()->ip(),
                        ]);
                    } catch (\Exception $e) {
                        // Fail silently if ActivityLog fails
                    }
                    
                    return false;
                }
            }
        } catch (\Exception $e) {
            $errorMsg = "SMS sending exception: " . get_class($e) . " - " . $e->getMessage();
            Log::error('SMS sending exception', [
                'exception' => get_class($e),
                'message' => $e->getMessage(),
                'phone' => $phoneNumber ?? 'unknown',
                'trace' => $e->getTraceAsString(),
            ]);
            
            // Log to ActivityLog
            try {
                \App\Models\ActivityLog::create([
                    'user_id' => \Illuminate\Support\Facades\Auth::id(),
                    'action' => 'sms_error',
                    'model_type' => 'SMS',
                    'description' => $errorMsg . ' - Phone: ' . ($phoneNumber ?? 'unknown'),
                    'ip_address' => request()->ip(),
                ]);
            } catch (\Exception $logException) {
                // Fail silently if ActivityLog fails
            }
            
            return false;
        }
    }

    /**
     * Send email notification
     */
    public function sendEmail(string $email, string $subject, string $message, array $data = [], ?NotificationProvider $provider = null)
    {
        try {
            $provider = $provider ?? $this->emailProvider;
            
            // Use Laravel's built-in Mail facade
            if ($provider) {
                config([
                    'mail.mailers.smtp.host' => $provider->mail_host ?? config('mail.mailers.smtp.host'),
                    'mail.mailers.smtp.port' => $provider->mail_port ?? config('mail.mailers.smtp.port'),
                    'mail.mailers.smtp.username' => $provider->mail_username ?? config('mail.mailers.smtp.username'),
                    'mail.mailers.smtp.password' => $provider->mail_password ?? config('mail.mailers.smtp.password'),
                    'mail.mailers.smtp.encryption' => $provider->mail_encryption ?? config('mail.mailers.smtp.encryption'),
                    'mail.from.address' => $provider->mail_from_address ?? config('mail.from.address'),
                    'mail.from.name' => $provider->mail_from_name ?? config('mail.from.name'),
                ]);
            } else {
                // Fallback to SystemSetting or env
                config([
                    'mail.mailers.smtp.host' => SystemSetting::getValue('mail_host') ?: env('MAIL_HOST', config('mail.mailers.smtp.host')),
                    'mail.mailers.smtp.port' => SystemSetting::getValue('mail_port') ?: env('MAIL_PORT', config('mail.mailers.smtp.port')),
                    'mail.mailers.smtp.username' => SystemSetting::getValue('mail_username') ?: env('MAIL_USERNAME', config('mail.mailers.smtp.username')),
                    'mail.mailers.smtp.password' => SystemSetting::getValue('mail_password') ?: env('MAIL_PASSWORD', config('mail.mailers.smtp.password')),
                    'mail.mailers.smtp.encryption' => SystemSetting::getValue('mail_encryption') ?: env('MAIL_ENCRYPTION', config('mail.mailers.smtp.encryption')),
                    'mail.from.address' => SystemSetting::getValue('mail_from_address') ?: env('MAIL_FROM_ADDRESS', config('mail.from.address')),
                    'mail.from.name' => SystemSetting::getValue('mail_from_name') ?: env('MAIL_FROM_NAME', config('mail.from.name')),
                ]);
            }

            $isHtml = isset($data['is_html']) && $data['is_html'] === true;
            
            if (!$isHtml && (stripos($message, '<html') !== false || stripos($message, '<!DOCTYPE') !== false)) {
                $isHtml = true;
            }

            \Illuminate\Support\Facades\Mail::raw($message, function ($mail) use ($email, $subject, $isHtml) {
                $mail->to($email)
                     ->subject($subject);
                
                if ($isHtml) {
                    $mail->html($mail->getBody());
                }
            });

            Log::info('Email sent successfully', ['email' => $email]);
            return true;
        } catch (\Exception $e) {
            Log::error('Email sending error: ' . $e->getMessage(), [
                'email' => $email,
            ]);
            return false;
        }
    }
}

