<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
final readonly class Description
{
    public function __construct(
        public string $description,
    ) {
    }
}
