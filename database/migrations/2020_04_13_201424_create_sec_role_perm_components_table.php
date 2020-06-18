<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecRolePermComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sec_RolePermComponents', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdRolePermComponents');

            $table->unsignedTinyInteger('IdRole');
            $table->foreign('IdRole')->references('IdRole')->on('Sec_Roles');

            $table->unsignedSmallInteger('IdComponent');
            $table->foreign('IdComponent')->references('IdComponent')->on('Sec_Components');


            $table->unsignedSmallInteger('IdPermission');
            $table->foreign('IdPermission')->references('IdPermission')->on('Sec_Permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sec_RolePermComponents');
    }
}
