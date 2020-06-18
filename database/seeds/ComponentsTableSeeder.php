<?php

use Illuminate\Database\Seeder;
use App\Component;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $component = Component::Create([
        	'Name' => 'Login',
        	'Description' => 'Component Login',
        	'IdComponent1' => 0
        ]);
    }
}
