<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Utl_Quizzes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdQuiz');
            $table->unsignedInteger('IdModule');
            $table->foreign('IdModule')->references('IdModule')->on('Crs_Modules');
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
            $table->string('Title');
            $table->unsignedTinyInteger('TotalQuestions');
            $table->unsignedTinyInteger('PointsRightAnswer');
            $table->unsignedTinyInteger('PointsWrongAnswer');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->unsignedInteger('Duration');
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
        Schema::dropIfExists('Utl_Quizzes');
    }
}
