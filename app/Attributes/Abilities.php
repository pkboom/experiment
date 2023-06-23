<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
final readonly class Abilities
{
    public function __construct(
        public array $abilities,
    ) {
    }
}
