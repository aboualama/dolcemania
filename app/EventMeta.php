<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class EventMeta extends Model
{ 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $table = 'events_meta'; 



    protected $fillable = ['repeat_start', 'repeat_interval', 'event_id'];


    public function event() {
        return $this->belongsTo(Event::class);
    }
}
 