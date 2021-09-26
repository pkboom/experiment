<?php

namespace App\Support;

class Lottery
{
    /**
     * @var bool|null
     */
    private static $forceResult;

    public static function wins(int $chances, int $outof): bool
    {
        return self::$forceResult ?? random_int(1, $outof) <= $chances;
    }

    public static function forceWin(): void
    {
        self::$forceResult = true;
    }

    public static function forceLose(): void
    {
        self::$forceResult = false;
    }

    public static function reset(): void
    {
        self::$forceResult = null;
    }
}
