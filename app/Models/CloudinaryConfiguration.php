<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloudinaryConfiguration extends Model
{
    protected $fillable = [
        'name',
        'cloud_name',
        'api_key',
        'api_secret',
        'upload_preset',
        'is_default',
        'is_active',
        'description',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function testConnection()
    {
        try {
            \Cloudinary\Configuration\Configuration::instance([
                'cloud' => [
                    'cloud_name' => $this->cloud_name,
                    'api_key' => $this->api_key,
                    'api_secret' => $this->api_secret,
                ]
            ]);
            
            $adminApi = new \Cloudinary\Api\Admin\AdminApi();
            $result = $adminApi->ping();
            return ['success' => true, 'message' => 'Connection successful'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
