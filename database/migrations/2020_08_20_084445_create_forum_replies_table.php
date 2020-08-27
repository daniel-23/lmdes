<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Utl_Forum_Replies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdForumReply');
            $table->unsignedInteger('IdForum');
            $table->foreign('IdForum')->references('IdForum')->on('Utl_Forums');
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
            $table->string('Title');
            $table->text('Description');
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
        Schema::dropIfExists('Utl_Forum_Replies');
    }
}
