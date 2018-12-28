<?php
/*
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'slug' => $faker->word,
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'p_iva' => $faker->word,
        'legal_address' => $faker->word,
        'operative_address' => $faker->word,
        'phone_number' => $faker->randomNumber(),
        'cell_number' => $faker->randomNumber(),
        'web_adress' => $faker->word,
        'is_customer' => $faker->boolean,
        'is_supplier' => $faker->randomNumber(),
        'is_user' => $faker->randomNumber(),
        'bank_iban' => $faker->word,
        'bank_swift' => $faker->word,
        'bank_name' => $faker->word,
        'payment_term' => $faker->word,
        'payment_method' => $faker->word,
        'payment_typology' => $faker->word,
        'vat' => $faker->randomFloat(),
        'product_prices_name' => $faker->word,
        'title' => function () {
            ;
        },
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'quantity_tin' => $faker->randomNumber(),
        'vat' => $faker->randomFloat(),
        'default_price' => $faker->randomFloat(),
    ];
});

$factory->define(App\ProductPrice::class, function (Faker\Generator $faker) {
    return [
        'product_id' => function () {
             return factory(App\Product::class)->create()->id;
        },
        'title' => $faker->word,
        'price' => $faker->randomFloat(),
        'temporary' => $faker->boolean,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
    ];
});
*/
