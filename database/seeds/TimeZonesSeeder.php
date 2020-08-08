<?php

use Illuminate\Database\Seeder;
use App\TimeZone;
class TimeZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimeZone::create(['Name'=>'America/Bogota','Prefix'=>'AB']);
    }
}
