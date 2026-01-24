<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationProvider extends Model
{
    protected $fillable = [
        'name', 'type', 'is_primary', 'is_active',
        'sms_username', 'sms_password', 'sms_from', 'sms_url',
        'mail_host', 'mail_port', 'mail_username', 'mail_password',
        'mail_encryption', 'mail_from_address', 'mail_from_name',
        'notes'
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'is_active' => 'boolean',
        'mail_port' => 'integer',
    ];

    public static function getPrimary(string $type)
    {
        return static::where('type', $type)
            ->where('is_primary', true)
            ->where('is_active', true)
            ->first();
    }
}
