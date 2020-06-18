<?php

use Illuminate\Database\Seeder;
use App\ParameterGeneral;

class ParGeneralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $par = ParameterGeneral::create();
    }
}
