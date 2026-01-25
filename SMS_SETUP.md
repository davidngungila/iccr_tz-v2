# SMS Integration Setup Guide

This guide explains how to configure SMS notifications for event registrations.

## Environment Variables

Add these variables to your `.env` file:

```env
# SMS API Configuration
SMS_API_URL=https://api.your-sms-provider.com/sms
SMS_API_KEY=your_api_key_here
SMS_SENDER_ID=ICCR TZ
```

## SMS Provider Options for Tanzania

### 1. Africa's Talking
- Website: https://africastalking.com
- API Documentation: https://developers.africastalking.com/docs/sms
- Good for: Tanzania, Kenya, Uganda, and other African countries

### 2. Twilio
- Website: https://www.twilio.com
- API Documentation: https://www.twilio.com/docs/sms
- Good for: Global coverage including Tanzania

### 3. Direct Integration with Tanzanian Networks
- Vodacom Tanzania API
- Tigo Tanzania API
- Airtel Tanzania API

## Implementation Notes

The SMS integration is currently set up to use a generic REST API. You'll need to:

1. **Choose your SMS provider** and sign up for an account
2. **Get your API credentials** (API key, API URL, etc.)
3. **Update the `.env` file** with your credentials
4. **Modify the `sendRegistrationSMS()` method** in `EventRegistrationController.php` to match your provider's API format

## Example: Africa's Talking Integration

If using Africa's Talking, update the `sendRegistrationSMS()` method:

```php
$username = env('AFRICASTALKING_USERNAME');
$apiKey = env('AFRICASTALKING_API_KEY');

$ch = curl_init('https://api.africastalking.com/version1/messaging');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'apiKey: ' . $apiKey,
    'Content-Type: application/x-www-form-urlencoded',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'username' => $username,
    'to' => $registration->phone,
    'message' => $message,
    'from' => $smsSenderId,
]));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
```

## Testing

To test SMS functionality:

1. Register for an event through the website
2. Check the Laravel logs (`storage/logs/laravel.log`) for SMS sending status
3. Verify the `sms_sent` field in the `event_registrations` table

## Troubleshooting

- **SMS not sending**: Check that `SMS_API_KEY` is set in `.env`
- **API errors**: Check Laravel logs for detailed error messages
- **Phone format**: Ensure phone numbers are in international format (e.g., +255123456789)


