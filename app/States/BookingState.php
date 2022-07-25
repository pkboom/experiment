<?php

namespace App\States;

use AwStudio\States\State;

class BookingState extends State
{
    public const PENDING = 'pending';
    public const FAILED = 'failed';
    public const SUCCESSFULL = 'successfull';

    public const INITIAL_STATE = self::PENDING;
    public const FINAL_STATES = [self::FAILED, self::SUCCESSFULL];

    public static function config()
    {
        self::set(BookingStateTransitions::PAYMENT_PAID)
            ->from(self::PENDING)
            ->to(self::SUCCESSFULL);
        self::set(BookingStateTransitions::PAYMENT_FAILED)
            ->from(self::PENDING)
            ->to(self::FAILED);
    }
}
