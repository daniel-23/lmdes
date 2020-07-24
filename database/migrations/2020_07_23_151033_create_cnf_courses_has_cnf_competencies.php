<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfCoursesHasCnfCompetencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Courses_has_Cnf_Competencies', function (Blueprint $table) {
            $table->unsignedInteger('IdCourse');
            $table->foreign('IdCourse')->references('IdCourse')->on('Cnf_Courses');
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
        Schema::dropIfExists('Cnf_Courses_has_Cnf_Competencies');
    }
}
