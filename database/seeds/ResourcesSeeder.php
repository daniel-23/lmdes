<?php

use Illuminate\Database\Seeder;
use App\Resource;
class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recursos = ['Videos','Foros','Tareas','Quiz'];
        foreach ($recursos as $key) {
        	Resource::create(['Name' => $key]);
        }
    }
}
