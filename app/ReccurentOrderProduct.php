<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReccurentOrderProduct extends Model 
{


    protected $table = 'order_products'; 


    protected $fillable = array('order_id', 'product_id', 'price', 'qty_1', 'qty_2', 'val_1', 'val_2');



 
} 