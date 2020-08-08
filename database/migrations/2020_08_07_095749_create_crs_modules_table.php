<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrsModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Crs_Modules', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdModule');
            $table->string('Name',100);
            $table->string('Description',100)->nullable();
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->unsignedInteger('IdCourse');
            $table->foreign('IdCourse')->references('IdCourse')->on('Cnf_Courses');
            $table->unsignedInteger('IdModuleParent')->nullable();
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
        Schema::dropIfExists('Crs_Modules');
    }
}
