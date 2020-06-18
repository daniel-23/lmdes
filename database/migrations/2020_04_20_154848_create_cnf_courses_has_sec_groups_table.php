<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfCoursesHasSecGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Courses_has_Sec_Groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdCnf_Courses_has_Sec_Groups');
            $table->unsignedInteger('IdCourse');
            $table->foreign('IdCourse')->references('IdCourse')->on('Cnf_Courses');
            $table->unsignedInteger('IdGroup');
            $table->foreign('IdGroup')->references('IdGroup')->on('Sec_Groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Courses_has_Sec_Groups');
    }
}
