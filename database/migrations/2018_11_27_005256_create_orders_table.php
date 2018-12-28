<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->unsignedInteger('id_client');
            $table->unsignedInteger('event_id')->nullable();

            $table->integer('total_1');
            $table->integer('total_2');
            $table->timestamp('order_date')->nullable();

            $table->unsignedInteger('invoice_id')->nullable();
            $table->boolean('recurrent')->default(false);

            $table->boolean('invoice')->default(false); 

            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('set null');


            $table->softDeletes('deleted_at'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
