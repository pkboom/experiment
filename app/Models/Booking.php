<?php

namespace App\Models;

use App\States\BookingState;
use AwStudio\States\HasStates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    use HasStates;

    protected $guarded = [];

    protected $states = [
        'state' => BookingState::class,
    ];
}
