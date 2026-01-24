<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrayerRequest extends Model
{
    protected $fillable = [
        'event_id', 'name', 'email', 'phone', 'request', 'status', 'is_anonymous'
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
