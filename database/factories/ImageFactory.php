<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'image' => 'https://laraheroherotest.s3.ap-northeast-1.amazonaws.com/FlUmkgQY5zEEQCpvieO4RxcwNKVqRDnMiHjxAhpT.jpeg',
    ];
});
