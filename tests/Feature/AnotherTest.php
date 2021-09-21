<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Server\Server;
use Tests\TestCase;

class AnotherTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::create([
            'name' => 'asdf',
            'password' => bcrypt('asdfasdf'),
            'email' => 'asdf@asdf.com',
        ]);
    }

    public function testExample()
    {
        sleep(1);
        $this->get('/')->assertOk();

        $this->travel(5)->minutes();
    }

    public function testExample2()
    {
        Server::boot();
    }
}
