<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Par_General', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->tinyIncrements('IdGenCompany');
            $table->string('Logo',100)->nullable();
            $table->string('Appearance',100)->nullable();
            $table->string('Emailserver',45)->nullable();
            $table->string('EmailSender',45)->nullable();
            $table->unsignedInteger('MaxSizeFile')->nullable()->comment('In MB');
            $table->string('ActivateNotifications',1)->default('Y')->comment('Y = Yes, N = No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Par_General');
    }
}
