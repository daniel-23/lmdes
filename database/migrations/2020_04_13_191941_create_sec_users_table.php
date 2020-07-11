<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sec_Users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdUser');
            $table->string('Code',20)->nullable();
            $table->string('Name',200)->nullable();
            $table->string('LastName',200)->nullable();
            $table->string('Email',200)->unique();
            $table->string('Status',1)->default('A')->comment('A = active, I = inactive, B = bloqued');
            $table->string('password');
            $table->unsignedTinyInteger('Attemps')->default(0);
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdateAt');
            $table->string('VerifyUser')->nullable();
            $table->string('VerifyToken',200)->nullable();
            $table->string('RecoveryToken',200)->nullable();
            $table->unsignedInteger('IdCompany')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sec_Users');
    }
}
