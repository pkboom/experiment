<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self draft()
 * @method static self PREVIEW()
 * @method static self PUBLISHED()
 * @method static self ARCHIVED()
 */
final class StatusEnum extends Enum
{
}
