<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        dd(User::factory());
    }
}

function generate_numbers()
{
    $number = 1;

    while (true) {
        yield $number;

        $number++;
    }
}
function take($generator, $limit)
{
    foreach ($generator as $index => $value) {
        if ($index === $limit) {
            break;
        }

        yield $value;
    }
}
