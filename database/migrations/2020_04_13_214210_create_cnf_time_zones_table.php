<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfTimeZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_TimeZones', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->tinyIncrements('IdTimeZone');
            $table->string('Name',100);
            $table->string('Prefix',10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_TimeZones');
    }
}
