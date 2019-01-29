<?php

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'name' => $faker->name,
        'image' => $faker->imageUrl(),
        'apartment' => $faker->streetAddress,
        'apartment_image' => $faker->image(),
        'description' => ''
    ];
});
