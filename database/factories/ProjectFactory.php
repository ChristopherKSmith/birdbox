<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence(4),
        'description' => $faker->sentence(4),
        'notes'       => 'Foo bar',
        'owner_id'    => function () {
            return factory(App\User::class);
        },
    ];
});
