<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'image' => 'https://gyazo.com/7eb254428f502baa69113543be1b0d11',
    ];
});
