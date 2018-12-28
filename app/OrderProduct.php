<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

    protected $table = 'order_products';


    protected $fillable = array('order_id', 'product_id', 'product_title', 'price', 'qty_1', 'qty_2', 'val_1', 'val_2');


    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }


    public function categories()
    {
        return json_encode($this->belongsToMany(Category::class, 'products_categories', 'product_id')->toArray());
    }


}
