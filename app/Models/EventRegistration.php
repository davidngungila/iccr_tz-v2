<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventRegistration extends Model
{
    protected $fillable = [
        'event_id', 'full_name', 'email', 'phone', 'campus', 'institution',
        'year_of_study', 'course', 'special_requirements', 'dietary_restrictions',
        'accommodation_needed', 'transportation_needed', 'emergency_contact_name',
        'emergency_contact_phone', 'status', 'sms_sent', 'admin_notes'
    ];

    protected $casts = [
        'sms_sent' => 'boolean',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function payments()
    {
        return $this->hasMany(EventPayment::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
