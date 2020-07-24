<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnfBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cnf_Badges', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdBadge');
            $table->string('Name',100)->unique();
            $table->string('Description')->nullable();
            $table->string('Image')->nullable();
            $table->string('Enabled',1)->default('E')->comment('E = enabled, D = disabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cnf_Badges');
    }
}
