<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'name',
        'tagline',
        'bio',
        'location',
        'email',
        'phone',
        'github',
        'linkedin',
        'photo_url',
    ];
}
