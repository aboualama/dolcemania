<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $fillable = ['title','quantity_tin','vat','default_price'];


    public function categories()
    {
        return $this->belongsToMany(Category::class,'products_categories');
    }

    public function categoriesString(){
        return $this->belongsToMany(Category::class,'products_categories');
    }

    public function productPrice()
    {
        return $this->hasMany(ProductPrice::class);
    } 

    public function order()
    {
        return $this->belongsToMany(Order::class,'order_products');
    }

}
