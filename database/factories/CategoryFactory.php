<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        '_lft' => $faker->randomNumber(1),
        '_rgt' => $faker->randomNumber(1),
    ];
});
