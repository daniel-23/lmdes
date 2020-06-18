<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_States', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->mediumIncrements('IdState');
            $table->string('Name',100);
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdateAt');
            $table->unsignedTinyInteger('IdCountry');
            $table->foreign('IdCountry')->references('IdCountry')->on('Cnf_Countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_States');
    }
}
