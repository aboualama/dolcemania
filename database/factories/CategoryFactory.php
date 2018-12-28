<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement('categoria 1', 'categoria 2' ,'categoria 3' ,'categoria 4' ,'categoria 5')
    ];
});
