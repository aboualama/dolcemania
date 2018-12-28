<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateExcludeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exclude_events', function (Blueprint $table) {
            $table->unsignedInteger('event_id')->nullable()->change();
            $table->renameColumn('event_id', 'event_meta_id');
            $table->renameColumn('x', 'date');
           // $table->foreign('event_meta_id')->refrences('id')->on('evnets_meta')->onDelete('set NULL');

          //  $table->foreign('event_meta_id')->references('id')->on('events_meta')->onDelete('set NULL');

        });
        Schema::table('exclude_events', function ($table) {
       //     $table->dropColumn(['event_meta_id']);
            $table->foreign('event_meta_id')->references('id')->on('events_meta')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
