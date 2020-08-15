<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfGradesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Grades_Categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdGradeCategory');
            $table->string('Name',100);
            $table->string('TotalCalcule',100)->comment('S=Simple weighted, average (all the same percentage), W=Weighted average (each has a different percentage), M=Minimum and maximum rating');
            $table->unsignedInteger('MinimunRating');
            $table->unsignedInteger('MaximumRating');
            $table->unsignedInteger('IdGradeCategoryParent');
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
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
        Schema::dropIfExists('Cnf_Grades_Categories');
    }
}
