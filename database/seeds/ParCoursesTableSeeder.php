<?php

use Illuminate\Database\Seeder;
use App\ParameterCourse;

class ParCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParameterCourse::create();
    }
}
