<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
final readonly class Key
{
    public function __construct(
        public array $key,
    ) {
    }
}
