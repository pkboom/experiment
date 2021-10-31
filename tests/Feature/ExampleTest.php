<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testExample()
    {
        $this->seed(DatabaseSeeder::class);

        User::first()->latestMessage;

        $this->assertTrue(true);
    }
}
