<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecUserParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sec_User_Parameters', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->tinyIncrements('IdUserParamater');
            $table->unsignedInteger('SessionTime')->default(0)->comment('Timeout value in seconds');
            
            $table->unsignedTinyInteger('PasswordStrength')->default(2)->comment('0 = Too short: each password is less than 5 characters, 1 = Low: each password must have a minimum of 5 characters, 2 = Medium: each password must have a minimum of 6 characters, include uppercase and lowercase letters and numbers, 3 = High: each password must have a minimum of 8 characters, include uppercase and lowercase letters and numbers, include a special character other than a letter or number.');
            
            $table->unsignedSmallInteger('ChangePassword')->default(0)->comment('Variable in days, 0 = dont change password');

            $table->string('Avatar',45)->nullable();

            $table->unsignedTinyInteger('SessionFailedAttempts')->default(0)->comment("After attempts, the user will disabled 0= Don't limit attempts");

            $table->unsignedInteger('DisabledTime')->default(0)->comment("Disabled User Time value in seconds");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sec_User_Parameters');
    }
}
