<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsMetaTable extends Migration {

	public function up()
	{
		Schema::create('events_meta', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
  
			$table->integer('repeat_start');
            $table->integer('repeat_interval'); 

            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade'); 
		});
	}

	public function down()
	{
		Schema::drop('events_meta');
	}
}

