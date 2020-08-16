<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(1), 0, -1),
        'body' => $faker->paragraph(),
        'user_id' => rand(1, 5),
    ];
});
