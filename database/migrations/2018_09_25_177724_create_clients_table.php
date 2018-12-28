<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('company_name');
            $table->string('reference_name');
            $table->string('p_iva')->nullable();

            $table->string('legal_address')->nullable();
            $table->string('operative_address')->nullable();

            $table->integer('phone_number')->nullable();
            $table->integer('cell_number');

            $table->string('web_adress')->nullable();

            $table->boolean('is_customer')->default(false);
            $table->integer('is_supplier')->default(false);
            $table->integer('is_user')->default(false);


            $table->string('bank_iban')->nullable();
            $table->string('bank_swift')->nullable();
            $table->string('bank_name')->nullable();
            $table->enum('payment_term',['asd'])->nullable();
            $table->enum('payment_method',['asd'])->nullable();
            $table->string('payment_typology')->nullable();
            $table->float('vat')->nullable();

            $table->string('notes')->nullable();


            $table->string('product_prices_name')->nullable()->index();



            $table->timestamps();
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
        Schema::dropIfExists('clients');
    }
}
