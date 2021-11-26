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

        $asdf = csrf_token();

        dump($asdf);
        $this->get('/');
        dump('asdf');
        dump($asdf);
        $this->get('/login');
        dump('asdf');
        dump($asdf);

        $this->assertTrue(true);
    }
}
