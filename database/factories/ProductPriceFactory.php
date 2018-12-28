<?php

use Faker\Generator as Faker;

$factory->define(App\ProductPrice::class, function (Faker $faker) {
    return [
        'title'      => "prova",
        'product_id' => rand(1,232),

        'price'          => $faker->randomFloat(2, 0, 3),

    ];
});
