<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Templates', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdTemplate');
            $table->string('Name',100)->unique();
            $table->string('Description',500)->nullable();
            $table->dateTime('LimitDate');
            $table->unsignedInteger('IdTemplateParent');
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
        Schema::dropIfExists('Cnf_Templates');
    }
}
