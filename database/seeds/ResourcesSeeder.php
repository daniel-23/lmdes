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
        $recursos = ['Videos','Foros','Tareas','Quiz','Url','File','Page','Lesson','Glosary','Survey','Book'];
        foreach ($recursos as $key) {
        	Resource::create(['Name' => $key]);
        }
    }
}
