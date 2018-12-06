<?php

use Faker\Generator as Faker;

$factory->define(App\Component::class, function (Faker $faker) {
    return [
        'component_id' => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->words(24, true),
        'units' => 600,
        'module_order' => 1,
        'required' => true,
    ];
});
