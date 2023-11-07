<?php

namespace Database\Seeders;

use App\Models\DeviceRendering;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe2',
            'email' => 'asdf2@asdf.com',
            'password' => bcrypt('asdfasdf'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'asdf@asdf.com',
            'password' => bcrypt('asdfasdf'),
        ]);

        User::factory()
            ->count(10)
            ->create();

        DeviceRendering::factory()
        ->count(100)
        ->create();

    }
}
