<?php

use Illuminate\Database\Seeder;
use App\AudEvent;

class AudEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
        	'Register',
        	'Login',
			'Logout',
			'Update',
			'Create',
			'Delete',
			'Begin Course',
			'Finish Course',
		];
        foreach ($events as $value) {
			AudEvent::create(['Description' => $value]);
		}
    }
}
