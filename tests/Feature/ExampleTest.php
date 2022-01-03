<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testExample()
    {
        $user = User::factory()->create();

        $this->assertTrue(true);
    }

    public function testExample2()
    {
        $user = User::factory()->create();

        $this->assertTrue(true);
    }
}
