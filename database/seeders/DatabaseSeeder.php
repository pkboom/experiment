<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'asdf',
            'password' => bcrypt('asdfasdf'),
            'email' => 'asdf@asdf.com',
        ]);

        Message::factory(3)
            ->for($user)
            ->create();

        $user = User::create([
            'name' => 'asdf2',
            'password' => bcrypt('asdfasdf'),
            'email' => 'asdf2@asdf.com',
        ]);

        Message::factory(3)
            ->for($user)
            ->create();

        $user = User::create([
            'name' => 'asdf3',
            'password' => bcrypt('asdfasdf'),
            'email' => 'asdf3@asdf.com',
        ]);
    }
}
