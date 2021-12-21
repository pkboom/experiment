<?php

namespace Tests\Feature;

use Tests\TestCase;

class HelloTest extends TestCase
{
    public function testHello()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
