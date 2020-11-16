<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\User;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => 'テスト',
        'body' => 'テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト',
        'status' => 2,
        'price' => 3000,
        'fee' => 200,
        'region' => 4,
        'delivery_day' => 23,
        'quantity' => 20,
        'seller_id' => function() {
            return factory(User::class);
        },
    ];
});