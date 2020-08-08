<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecUsersHasSecGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sec_Users_has_Sec_Groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
            $table->unsignedInteger('IdGroup');
            $table->foreign('IdGroup')->references('IdGroup')->on('Sec_Groups');
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
        Schema::dropIfExists('Sec_Users_has_Sec_Groups');
    }
}
