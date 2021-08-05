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

        Message::factory(10)
            ->for($user)
            ->create();
    }
}
