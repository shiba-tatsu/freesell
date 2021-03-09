<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'image' => 'https://i.gyazo.com/c3fb7697812b9e18a9244724432461c5.png',
    ];
});
