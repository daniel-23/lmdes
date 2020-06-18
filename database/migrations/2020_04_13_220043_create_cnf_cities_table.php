<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdCity');
            $table->string('Name',100);
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdateAt');
            $table->unsignedMediumInteger('IdState');
            $table->foreign('IdState')->references('IdState')->on('Cnf_States');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Cities');
    }
}
