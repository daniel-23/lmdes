<?php

use Illuminate\Database\Seeder;
use App\UserParameter;

class UsersParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $par = UserParameter::create();
    }
}
