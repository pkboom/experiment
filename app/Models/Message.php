<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    protected $casts = [
        // 'address' => 'array',
        'address' => Address2::class,
    ];
}
