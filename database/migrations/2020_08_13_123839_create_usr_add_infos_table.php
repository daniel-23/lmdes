<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsrAddInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usr_Add_Info', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdAddInfo');
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
            $table->string('Photo',200)->nullable();
            $table->string('Gender',1)->comment('M=Male, F=Female');
            $table->date('BirthDate');
            $table->unsignedSmallInteger('Height')->comment('Value in centimeters')->nullable();
            $table->unsignedSmallInteger('Weight')->comment('Value in kilograms')->nullable();
            $table->string('RH',5)->comment('A+, A-, B+, B-, O+, O-, AB+, AB-')->nullable();
            $table->string('HealthCareEntity')->nullable();
            $table->string('HealthCareType',100)->nullable();
            $table->string('HealthCareContactName')->nullable();
            $table->string('HealthCareContactPhone',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Usr_Add_Info');
    }
}
