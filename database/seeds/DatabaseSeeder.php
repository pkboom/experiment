<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $users = factory(User::class, 10)->create();

        Collection::times(100, function ($key) use ($users) {
            factory(Post::class)->create([
                'user_id' => $users->random()->id,
            ]);
        });
    }
}
