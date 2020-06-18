<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdCourse');
            $table->string('ShortName',45)->nullable();
            $table->string('Name',100);
            $table->unsignedInteger('IdCourseCategory');
            $table->foreign('IdCourseCategory')->references('IdCourseCategory')->on('Cnf_Courses_Categories');
            $table->string('Code',20)->nullable();
            $table->string('Description',500)->nullable();
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->dateTime('StartDate');
            $table->dateTime('EndDate');
            $table->unsignedInteger('IdCourseFormat');
            $table->foreign('IdCourseFormat')->references('IdCourseFormat')->on('Cnf_Courses_Format');
            $table->unsignedInteger('ModulesNumber');
            $table->unsignedInteger('ModulesFormat');
            $table->unsignedTinyInteger('IdLanguage');
            $table->foreign('IdLanguage')->references('IdLanguage')->on('Cnf_Languages');

            $table->string('ShowCalifications',1)->default('Y')->comment('Y = yes, N = No');

            $table->unsignedInteger('MaxFileSize')->nullable()->comment('In MB - Default value on Sec_Company table or less');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Courses');
    }
}
