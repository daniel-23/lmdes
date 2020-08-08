<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrsModulesHasCrsResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Crs_Modules_has_Crs_Resources', function (Blueprint $table) {
            $table->unsignedInteger('IdModule');
            $table->foreign('IdModule')->references('IdModule')->on('Crs_Modules');
            $table->unsignedInteger('IdCrsResource');
            $table->foreign('IdCrsResource')->references('IdCrsResource')->on('Crs_Resources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Crs_Modules_has_Crs_Resources');
    }
}
