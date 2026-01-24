<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'banner_image',
        'start_date', 'end_date', 'location', 'status',
        'is_featured', 'order', 'event_type', 'theme', 'scripture',
        'gallery', 'google_maps_link', 'organizing_team', 'contacts',
        'fee_type', 'fee_amount', 'fee_currency', 'max_attendees',
        'registration_type', 'auto_confirm', 'require_payment'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
        'order' => 'integer',
        'gallery' => 'array',
        'organizing_team' => 'array',
        'contacts' => 'array',
        'fee_amount' => 'decimal:2',
        'max_attendees' => 'integer',
        'auto_confirm' => 'boolean',
        'require_payment' => 'boolean',
    ];

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function payments()
    {
        return $this->hasMany(EventPayment::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function programs()
    {
        return $this->hasMany(EventProgram::class)->orderBy('program_date')->orderBy('order');
    }

    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }

    public function prayerRequests()
    {
        return $this->hasMany(PrayerRequest::class);
    }

    public function testimonies()
    {
        return $this->hasMany(Testimony::class);
    }
}
