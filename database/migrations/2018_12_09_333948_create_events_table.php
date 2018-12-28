<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration
{

    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('event_name');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
        Schema::table('orders', function ($table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('set null');


        });
    }

    public function down()
    {
        Schema::drop('events');
    }
}

