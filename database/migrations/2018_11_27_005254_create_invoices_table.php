<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->string('prefix')->default('NF');
            $table->integer('invoice_number');
            $table->float('amount');
            $table->unsignedInteger('client_id')->unsigned();
            $table->string('note')->nullable();
            $table->boolean('cancelled')->default(false);
            $table->integer('invoice_nc_number')->nullable();
            $table->string('invoce_nc_prefix')->default('NC');
            $table->boolean('manual')->default(false);
            $table->text('reason')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
