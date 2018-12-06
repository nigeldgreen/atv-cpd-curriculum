<?php

use Faker\Generator as Faker;

$factory->define(App\Module::class, function (Faker $faker) {
    return [
        'module_id' => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->words(24, true),
        'public' => true,
    ];
});
