<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body'  => $faker->paragraph,
        'user_id' => factory(\App\User::class)->create()->id,
    ];
});
