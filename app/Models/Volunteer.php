<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Volunteer extends Model
{
    protected $fillable = [
        'event_id', 'full_name', 'email', 'phone', 'institution',
        'team', 'duties', 'duty_date', 'duty_start_time', 'duty_end_time',
        'status', 'attendance_taken', 'notes'
    ];

    protected $casts = [
        'duty_date' => 'date',
        'duty_start_time' => 'datetime',
        'duty_end_time' => 'datetime',
        'attendance_taken' => 'boolean',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
