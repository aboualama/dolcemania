<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;


class ProductPrice extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'price',
        'temporary',
    ];

    public function product(){
        return $this->belongsTo(Product::class); //////////// wrong rela
    }
    public function Client(){
        return  $this->hasMany(Client::class,'product_prices_name','id');
    }
}
 