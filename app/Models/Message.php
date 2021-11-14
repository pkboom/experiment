<?php

namespace App\Models;

use App\Casts\AsSerialNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'serial_number' => AsSerialNumber::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
