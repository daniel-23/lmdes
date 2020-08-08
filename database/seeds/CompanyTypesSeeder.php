<?php

use Illuminate\Database\Seeder;
use App\CompanyType;
class CompanyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Colegio','Insttituto','Universidad','Otro'];
        foreach ($types as $type) {
        	CompanyType::create(['name'=>$type]);
        }
    }
}
