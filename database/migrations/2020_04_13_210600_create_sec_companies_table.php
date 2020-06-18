<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sec_Companies', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdCompany');
            $table->unsignedTinyInteger('IdCompanyType');
            $table->foreign('IdCompanyType')->references('IdCompanyType')->on('Cnf_CompanyTypes');
            $table->string('Name',400);
            $table->string('Email',100)->unique()->nullable();
            $table->string('WebSite',100)->nullable();
            $table->string('ContactName',100)->nullable();
            $table->string('DatabaseName',100)->nullable();
            $table->string('DatabaseUser',100)->nullable();
            $table->string('DatabasePassword',500)->nullable();
            $table->unsignedInteger('MaxSizeFile')->nullable()->comment('In MB');
            $table->unsignedInteger('MaxUsers')->nullable();
            $table->unsignedInteger('MaxDiscSpace')->nullable()->comment('In MB for User');
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdateAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sec_Companies');
    }
}
