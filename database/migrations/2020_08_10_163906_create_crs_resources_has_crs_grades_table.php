<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrsResourcesHasCrsGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Crs_Resources_has_Crs_Grades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdCrsResourcesHasCrsGrades');
            $table->unsignedInteger('IdCrsResource');
            $table->foreign('IdCrsResource')->references('IdCrsResource')->on('Crs_Resources');
            $table->unsignedInteger('IdGrade');
            $table->foreign('IdGrade')->references('IdGrade')->on('Cnf_Grades');
            $table->unsignedInteger('IdCrsModulesHasCrsResources');
            $table->foreign('IdCrsModulesHasCrsResources')->references('IdCrsModulesHasCrsResources')->on('Crs_Modules_has_Crs_Resources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Crs_Resources_has_Crs_Grades');
    }
}
