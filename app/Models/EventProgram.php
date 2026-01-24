<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventProgram extends Model
{
    protected $fillable = [
        'event_id', 'program_date', 'start_time', 'end_time', 'title',
        'description', 'session_type', 'speaker_name', 'speaker_bio',
        'location', 'order', 'is_break'
    ];

    protected $casts = [
        'program_date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_break' => 'boolean',
        'order' => 'integer',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
