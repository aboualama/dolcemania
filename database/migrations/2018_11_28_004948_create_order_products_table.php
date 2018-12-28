<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderproductsTable extends Migration {

	public function up()
	{
		Schema::create('order_products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();


            $table->integer('order_id')->unsigned();
            $table->string('product_id');
            $table->string('product_title');

			$table->decimal('price');
            $table->integer('qty_1');
            $table->integer('qty_2');
            $table->float('val_1');
            $table->float('val_2');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('order_products');
	}
}

