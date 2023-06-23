<?php

namespace App\Models;

use App\Attributes\Abilities;
use App\Attributes\Description;
use App\Attributes\Key;
use BackedEnum;
use Illuminate\Support\Str;
use ReflectionClassConstant;

trait CanAccessAttributes
{
    public static function abilities(BackedEnum $enum): array
    {

        $reflection = new ReflectionClassConstant(
            class: self::class,
            constant: $enum->name,
        );

        $attributes = $reflection->getAttributes(
            name: Abilities::class,
        );

        if (0 === count($attributes)) {
            return [Str::headline(
                value: strval($enum->value)
            )];
        }

        return $attributes[0]->newInstance()->abilities;
    }

    public static function key(BackedEnum $enum): string
    {
        $reflection = new ReflectionClassConstant(
            class: self::class,
            constant: $enum->name,
        );

        $attributes = $reflection->getAttributes(
            name: Key::class,
        );

        if (0 === count($attributes)) {
            return Str::headline(
                value: $enum->value
            );
        }

        return $attributes[0]->newInstance()->key;
    }

    public static function description(BackedEnum $enum): string
    {
        $reflection = new ReflectionClassConstant(
            class: self::class,
            constant: $enum->name,
        );

        $attributes = $reflection->getAttributes(
            name: Description::class,
        );

        if (0 === count($attributes)) {
            return Str::headline(
                value: $enum->value
            );
        }

        return $attributes[0]->newInstance()->description;
    }
}
