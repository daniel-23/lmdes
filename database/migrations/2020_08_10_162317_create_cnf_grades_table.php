<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Grades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdGrade');
            $table->string('Name',100);
            $table->string('Description',500);
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->unsignedInteger('IdGradeCategory');
            $table->foreign('IdGradeCategory')->references('IdGradeCategory')->on('Cnf_Grades_Categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Grades');
    }
}
