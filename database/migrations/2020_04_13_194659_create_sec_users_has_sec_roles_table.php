<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecUsersHasSecRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sec_Users_has_Sec_Roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
            $table->unsignedTinyInteger('IdRole');
            $table->foreign('IdRole')->references('IdRole')->on('Sec_Roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sec_Users_has_Sec_Roles');
    }
}
