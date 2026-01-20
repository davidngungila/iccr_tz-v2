<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'meta_title', 'meta_description',
        'route_name', 'view_path', 'status', 'order', 'views'
    ];

    protected $casts = [
        'order' => 'integer',
        'views' => 'integer',
    ];
}
