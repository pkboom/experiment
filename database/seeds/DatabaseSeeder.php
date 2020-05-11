<?php

use App\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(Post::class, 1000)->create();
    }
}
