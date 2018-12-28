<?php


use Faker\Generator as Faker;

$factory->define(App\ProductsCategory::class, function (Faker $faker) {
    return [
        'product_id' => $faker->name,
        'category_id' => $faker->email,

    ];
});

