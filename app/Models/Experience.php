<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company',
        'role',
        'start_date',
        'end_date',
        'is_current',
        'location',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'description' => 'array',   // Array of bullet strings stored as JSON
        'is_current'  => 'boolean',
        'sort_order'  => 'integer',
    ];
}
