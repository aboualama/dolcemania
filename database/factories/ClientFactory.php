<?php

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Model;

$factory->define(App\Client::class , function (Faker $faker)
{
    return [

          'company_name'            =>$faker->name ,
            'reference_name'         =>$faker->name ,
            'p_iva'             => $faker->randomDigit,
            'legal_address'     => $faker->address,
            'operative_address' => $faker->address,
            'phone_number'      => $faker->randomNumber(),
            'cell_number'       => $faker->randomNumber(),
            'web_adress'        => $faker->name,
            'is_customer'       => false,
            'is_supplier'       => false,
            'is_user'           => false,
            'bank_iban'         => $faker->iban(),
            'bank_swift'        => 'swiftcode',
            'bank_name'         => 'intesa San Paolo',
            'payment_term'      => '60GG',
            'payment_method'    => 'Contanti',

            'vat'               => 22,
            'product_prices_name' => function ($faker){

                return factory(App\ProductPrice::class)->create()->title;
},
        
    ];
});
