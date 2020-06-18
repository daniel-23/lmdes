<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfTemplatesHasCnfCompetenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Templates_has_Cnf_Compentencies', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdCnf_Templates_has_Cnf_Compentencies');
            $table->string('Description',500)->nullable();
            $table->unsignedInteger('IdTemplate');
            $table->foreign('IdTemplate')->references('IdTemplate')->on('Cnf_Templates');

            $table->unsignedInteger('IdCompetency');
            $table->foreign('IdCompetency')->references('IdCompetency')->on('Cnf_Competencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Templates_has_Cnf_Compentencies');
    }
}
