<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfCompetenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Competencies', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdCompetency');
            $table->string('Name',100)->unique();
            $table->string('Description',500)->nullable();
            $table->unsignedInteger('IdCompetencyParent');
            $table->unsignedInteger('IdScale');
            $table->foreign('IdScale')->references('IdScale')->on('Cnf_Scales');
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdateAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Competencies');
    }
}
