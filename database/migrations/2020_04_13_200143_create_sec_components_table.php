<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sec_Components', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->smallIncrements('IdComponent');
            $table->string('Name',100);
            $table->string('Description',500)->nullable();
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdateAt');
            $table->unsignedSmallInteger('IdComponent1')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sec_Components');
    }
}
