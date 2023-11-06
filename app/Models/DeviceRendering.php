<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceRendering extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'rendering_completed_at' => 'datetime',
    ];

}
