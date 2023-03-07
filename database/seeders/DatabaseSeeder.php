<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
            ->state(new Sequence(
                ['status' => 0],
                ['status' => 1],
            ))
            ->hasPosts(3)
            ->create();
    }
}
