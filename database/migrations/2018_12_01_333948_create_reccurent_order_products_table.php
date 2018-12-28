<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReccurentOrderproductsTable extends Migration {

	public function up()
	{
		Schema::create('reccurent_order_products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();


            $table->integer('reccurent_order_id')->unsigned();
 
            $table->integer('product_id')->unsigned();

			$table->decimal('price');
            $table->integer('qty_1');
            $table->integer('qty_2');
            $table->float('val_1');
            $table->float('val_2');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('reccurent_order_id')->references('id')->on('reccurent_orders')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('reccurent_order_products');
	}
}

