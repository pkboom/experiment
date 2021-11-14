<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Str;

class AsSerialNumber implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): string
    {
        return Str::of($attributes['serial_number_value'])
              ->padLeft(5, '0')
              ->start('-')
              ->prepend($attributes['serial_number_type'])
              ->__toString();
    }

    public function set($model, string $key, $value, array $attributes): array
    {
        return [
            'serial_number_type' => Str::beforeLast($value, '-'),
            'serial_number_value' => (int) Str::afterLast($value, '-'),
          ];
    }
}
