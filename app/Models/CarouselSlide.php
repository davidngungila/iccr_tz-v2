<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarouselSlide extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image_url',
        'cloudinary_public_id',
        'animation_type',
        'button_1_text',
        'button_1_url',
        'button_2_text',
        'button_2_url',
        'gradient_from',
        'gradient_via',
        'gradient_to',
        'is_urgent',
        'urgent_badge_text',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_urgent' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
