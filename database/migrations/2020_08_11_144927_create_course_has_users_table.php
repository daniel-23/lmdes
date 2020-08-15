<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Courses_has_Users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('IdCourse');
            $table->foreign('IdCourse')->references('IdCourse')->on('Cnf_Courses');
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Courses_has_Users');
    }
}
