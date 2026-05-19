<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'category',
        'category_order',
        'name',
        'level',
        'color',
    ];

    protected $casts = [
        'level'          => 'integer',
        'category_order' => 'integer',
    ];
}
