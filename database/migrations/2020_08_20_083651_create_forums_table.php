<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Utl_Forums', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdForum');
            $table->unsignedInteger('IdModule');
            $table->foreign('IdModule')->references('IdModule')->on('Crs_Modules');
            $table->string('Title');
            $table->text('Description');
            $table->unsignedTinyInteger('Order')->default(1);
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
        Schema::dropIfExists('Utl_Forums');
    }
}
