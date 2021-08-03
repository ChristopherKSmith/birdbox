<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence(),
        'description' => $faker->paragraph(),
        'owner_id'    => function () {
            return factory(App\User::class);
        },
    ];
});
