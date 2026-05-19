<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'tech',
        'github_url',
        'live_url',
        'image_url',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'tech'       => 'array',    // Stored as JSON in PostgreSQL
        'featured'   => 'boolean',
        'sort_order' => 'integer',
    ];
}
