<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $password = bcrypt('asdfasdf');

        $query = <<<QEURY
SET cte_max_recursion_depth = 4294967295;

INSERT INTO users (name, email, password)
WITH RECURSIVE counter(n) AS(
  SELECT 1 AS n
  UNION ALL
  SELECT n + 1 FROM counter WHERE n < 100
)
SELECT CONCAT('name-', counter.n), CONCAT(CONCAT('mail-',  counter.n), '@gmail.com'), '{$password}'
FROM counter
QEURY;

        DB::unprepared($query);
    }
}
