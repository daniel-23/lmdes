<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsrAddHealthInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usr_Add_Health_Info', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdAddHealthInfo');
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
            $table->string('Name',200)->nullable();
            $table->string('HealthInfoType',100)->nullable();
            $table->string('Description',100)->nullable();
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
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
        Schema::dropIfExists('Usr_Add_Health_Info');
    }
}
