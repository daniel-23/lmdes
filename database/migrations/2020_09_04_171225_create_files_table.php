<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Utl_Files', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdFile');
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
            $table->unsignedInteger('IdModule');
            $table->foreign('IdModule')->references('IdModule')->on('Crs_Modules');
            $table->string('Name');
            $table->string('Url');
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
        Schema::dropIfExists('Utl_Files');
    }
}
