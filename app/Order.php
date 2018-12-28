<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];



    protected $fillable = ['id_client', 'total','recurrent'];



    public function client() 
    {
        return $this->belongsTo(Client::class , 'id_client')->withTrashed();
    }
    

    public function product()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
    

    public function event()
    {
        return $this->hasOne(Event::class);
    }

    public function parentOrder()
    {
        return $this->belongsTo(Order::class, 'recurrent_id');
    }

    public function children()
    {
        return $this->hasMany(Order::class, 'recurrent_id');
    }
}

