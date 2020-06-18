<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Scales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdScale');
            $table->string('Name',100);
            $table->string('Description',500);
            $table->string('Scales',500)->nullable();
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Scales');
    }
}
