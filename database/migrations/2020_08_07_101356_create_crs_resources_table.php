<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrsResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Crs_Resources', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdCrsResource');
            $table->unsignedInteger('IdCourse');
            $table->foreign('IdCourse')->references('IdCourse')->on('Cnf_Courses');
            $table->unsignedInteger('IdResource');
            $table->foreign('IdResource')->references('IdResource')->on('Cnf_Resources');
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->dateTime('StartDate')->nullable();
            $table->dateTime('EndDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Crs_Resources');
    }
}
