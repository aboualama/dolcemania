<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {

            $table->dropColumn('payment_term');
            $table->dropColumn('payment_method');
          //  $table->string('cell_number',50)->nullable()->change();
           // $table->string('phone_number')->nullable();
    });
        Schema::table('clients', function (Blueprint $table) {

            $table->string('payment_term',50)->nullable();
            $table->string('mail',50)->nullable();
            $table->string('payment_method',50)->nullable();
            $table->string('cell_number',50)->nullable()->change();

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
