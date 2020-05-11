<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'body' => $faker->paragraph(),
        'tags' => $faker->randomElements(['php', 'api', 'oop', 'solid', 'mysql', 'database'], random_int(1, 3)),
    ];
});
