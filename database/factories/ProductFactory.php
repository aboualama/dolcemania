<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [

        'title'         => $faker->randomElement(['cream','marmellata','cioccolato','strudel','special crema']),
        'quantity_tin'  => $faker->numberBetween(6,20),
        'vat'           => 22,
        'default_price' => $faker->randomFloat(2,0,3),
    ];
});
