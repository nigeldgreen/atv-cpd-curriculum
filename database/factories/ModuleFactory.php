<?php

use Faker\Generator as Faker;

$factory->define(App\Module::class, function (Faker $faker) {
    return [
        'course_uuid' => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->words(24, true),
        'public' => true,
    ];
});
