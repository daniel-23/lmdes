<?php

use Illuminate\Database\Seeder;
use App\Language;
class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idiomas = ['Español','Ingles'];
        foreach ($idiomas as $key) {
        	Language::create(['Name' => $key]);
        }
    }
}
