<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testBasicTest()
    {
        Post::create([
            'title' => 'asdf',
            'body' => $this->faker->paragraph(),
            'tags' => $this->faker->randomElements(['php', 'api', 'oop', 'solid', 'mysql', 'database'], 2),
        ]);

        factory(Post::class, 100)->create();

        dd(Post::find(4));
    }
}
