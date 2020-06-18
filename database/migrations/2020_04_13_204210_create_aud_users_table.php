<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Aud_Users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('IdAuditUser');

            $table->unsignedInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('Sec_Users');

            $table->string('SessionTime',45)->nullable();
            $table->dateTime('DateStartSession')->nullable();
            $table->dateTime('DateEndSession')->nullable();
            $table->dateTime('DateEvent')->nullable();
            $table->ipAddress('IpConection')->nullable();

            $table->unsignedTinyInteger('IdEvent');
            $table->foreign('IdEvent')->references('IdEvent')->on('Aud_Events');

            $table->unsignedSmallInteger('IdComponent');
            $table->foreign('IdComponent')->references('IdComponent')->on('Sec_Components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Aud_Users');
    }
}
