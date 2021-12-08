<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testExample()
    {
        // User::first()->latestMessage;
        $this->get('/');

        $this->assertTrue(true);
    }
}
