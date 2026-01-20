<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    protected $fillable = [
        'title', 'type', 'content', 'button_text', 'button_url',
        'is_active', 'start_date', 'end_date', 'display_on', 'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'order' => 'integer',
    ];
}
