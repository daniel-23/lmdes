<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecAuthenticationProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sec_AuthenticationProvider', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('IdAuthenticationProvider');
            $table->string('ProviderKey',100)->nullable();
            $table->string('ProviderType',100)->nullable();
            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sec_AuthenticationProvider');
    }
}
