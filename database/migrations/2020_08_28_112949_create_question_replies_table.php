<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Utl_Question_Replies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdQuestionReply');
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
            $table->unsignedInteger('IdQuestion');
            $table->foreign('IdQuestion')->references('IdQuestion')->on('Utl_Questions');
            $table->unsignedInteger('IdOption')->nullable();
            $table->foreign('IdOption')->references('IdOption')->on('Utl_Options');
            $table->text('OpenAnswer')->nullable();
            $table->string('MultipleAnswer',10)->nullable();
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
        Schema::dropIfExists('Utl_Question_Replies');
    }
}
