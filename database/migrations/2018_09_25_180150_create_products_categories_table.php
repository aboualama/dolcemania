<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_categories', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('category_id');


            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');

            $table->primary(['product_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_categories');
    }
}
