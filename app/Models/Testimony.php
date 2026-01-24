<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimony extends Model
{
    protected $fillable = [
        'event_id', 'name', 'institution', 'email', 'phone', 'testimony',
        'status', 'is_featured', 'is_anonymous', 'photo'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_anonymous' => 'boolean',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
