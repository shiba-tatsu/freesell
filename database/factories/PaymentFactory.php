<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use App\Item;
use App\User;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(User::class);
        },
        'name' => $faker->text(10),
        'postal' => $faker->text(10),
        'rigion' => $faker->randomNumber(1),
        'city' => $faker->text(10),
        'address' => $faker->text(10),
        'phoneNumber' => $faker->text(10),
        'quantity' => $faker->randomNumber(1),
    ];
});
