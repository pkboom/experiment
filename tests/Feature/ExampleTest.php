<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
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
        $this->get('/');
    }
}
