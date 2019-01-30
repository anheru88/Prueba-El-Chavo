<?php

use App\Nick;
use Faker\Generator as Faker;

$factory->define(Nick::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
