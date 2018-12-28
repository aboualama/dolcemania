<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class Event extends Model
{ 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $table = 'events'; 



    protected $fillable = ['event_name'];


    public function order() {
        return $this->belongsTo(Order::class)->withTrashed();
    }

    
    public function events_meta() {
        return $this->hasOne(EventMeta::class);
    }
}
