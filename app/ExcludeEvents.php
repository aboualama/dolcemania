<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcludeEvents extends Model
{ 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $table = 'exclude_events';



    protected $fillable = ['event_meta_id','date'];


    public function eventMeta() {
        return $this->belongsTo(EventMeta::class);
    }

}
