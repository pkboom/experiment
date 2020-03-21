<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // $user = factory(User::class)->create([
        //     'name' => 'a',
        //     'email' => 'a@a.com',
        //     'password' => bcrypt('a'),
        // ]);

        $posts = factory(Post::class, 10)->create();
    }
}
