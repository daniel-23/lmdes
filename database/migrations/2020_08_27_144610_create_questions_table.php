<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Utl_Questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdQuestion');
            $table->unsignedInteger('IdQuiz');
            $table->foreign('IdQuiz')->references('IdQuiz')->on('Utl_Quizzes');
            $table->string('Question');
            $table->string('Type',20);
            $table->unsignedTinyInteger('CorrectAnswer')->nullable();
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
        Schema::dropIfExists('Utl_Questions');
    }
}
