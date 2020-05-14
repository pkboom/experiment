<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostmarkMessage;
use Faker\Generator as Faker;

$factory->define(PostmarkMessage::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'type' => $faker->randomElement(['Bounce', 'SpamComplaint']),
        'description' => $faker->sentence,
        'bounced_at' => '2020-05-05',
    ];
});
