<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Currencies', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->tinyIncrements('IdCurrency');
            $table->string('Name',45);
            $table->string('Symbol',4)->nullable();
            $table->string('Prefix',10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Currencies');
    }
}
