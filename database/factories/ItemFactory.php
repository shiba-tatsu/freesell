<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\User;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'body' => $faker->text(100),
        'status' => $faker->numberBetween(0, 5),
        'price' => $faker->numberBetween(10, 20000),
        'fee' => $faker->randomNumber(2),
        'region' => $faker->numberBetween(0, 46),
        'delivery_day' => $faker->randomNumber(1),
        'quantity' => $faker->numberBetween(1, 20),
        'seller_id' => function() {
            return factory(User::class);
        },
        'category_id' => $faker->numberBetween(18,245)
    ];
});