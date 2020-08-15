<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrsUsersHasCrsGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Crs_Users_has_Crs_Grades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdCrsUsersHasCrsGrades');
            $table->unsignedInteger('IdCrsModulesHasCrsResources');
            $table->foreign('IdCrsModulesHasCrsResources')->references('IdCrsModulesHasCrsResources')->on('Crs_Modules_has_Crs_Resources');
            $table->unsignedInteger('IdCrsResourcesHasCrsGrades');
            $table->foreign('IdCrsResourcesHasCrsGrades')->references('IdCrsResourcesHasCrsGrades')->on('Crs_Resources_has_Crs_Grades');
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
            $table->string('Value',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Crs_Users_has_Crs_Grades');
    }
}
