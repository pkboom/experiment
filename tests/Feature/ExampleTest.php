<?php

namespace Tests\Feature;

use App\Models\Post;
use Database\Seeders\DatabaseSeeder;
use Spatie\Snapshots\MatchesSnapshots;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use MatchesSnapshots;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertMatchesJsonSnapshot(Post::first()->toJson());
    }
}
