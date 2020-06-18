<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfCoursesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Courses_Categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdCourseCategory');
            $table->string('Name',100)->unique();
            $table->string('Code',20)->nullable();
            $table->string('Description',500)->nullable();
            $table->string('Color',10)->nullable();
            $table->string('Icon',100);
            $table->unsignedInteger('IdCourseCategoryParent');
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Courses_Categories');
    }
}
