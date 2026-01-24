<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'banner_image',
        'start_date', 'end_date', 'location', 'status',
        'is_featured', 'order'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
