<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfRegionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Regional', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdRegional');
            
            $table->unsignedInteger('IdCompany');
            $table->foreign('IdCompany')->references('IdCompany')->on('Sec_Companies');

            $table->unsignedInteger('IdCity');
            $table->foreign('IdCity')->references('IdCity')->on('Cnf_Cities');

            $table->unsignedTinyInteger('IdCurrency');
            $table->foreign('IdCurrency')->references('IdCurrency')->on('Cnf_Currencies');

            $table->unsignedTinyInteger('IdTimeZone');
            $table->foreign('IdTimeZone')->references('IdTimeZone')->on('Cnf_TimeZones');

            $table->unsignedTinyInteger('IdLanguage');
            $table->foreign('IdLanguage')->references('IdLanguage')->on('Cnf_Languages');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Regional');
    }
}
