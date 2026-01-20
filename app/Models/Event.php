<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'title_sw', 'slug', 'description', 'description_sw', 'content', 'content_sw',
        'full_details', 'full_details_sw', 'banner_image', 'start_date', 'end_date', 'location',
        'status', 'is_featured', 'order', 'payment_info', 'payment_info_sw',
        'prayer_meeting_link', 'prayer_meeting_code', 'prayer_schedule', 'prayer_schedule_sw',
        'registration_info', 'registration_info_sw', 'contact_phone', 'contact_email',
        'schedule', 'schedule_sw'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];
}
