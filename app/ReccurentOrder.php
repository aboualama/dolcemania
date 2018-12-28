<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReccurentOrder extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $fillable = ['id_client', 'total', 'invoice', 'order_date'];



    public function client()
    {
        return $this->belongsTo(Client::class , 'id_client');
    }
 
}
 