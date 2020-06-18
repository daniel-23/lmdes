<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Par_Courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->tinyIncrements('IdParCourse');
            $table->string('CourseFormat',100)->nullable();
            $table->unsignedMediumInteger('MaxCoursesNumber')->nullable();
            $table->unsignedMediumInteger('CourseDuration')->default(365)->comment('Default Value to finish courses in days');
            $table->unsignedMediumInteger('MaxModulesNumber')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Par_Courses');
    }
}
