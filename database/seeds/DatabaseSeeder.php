<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ParGeneralsTableSeeder::class);
        $this->call(ParCoursesTableSeeder::class);
        $this->call(UsersParametersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ComponentsTableSeeder::class);*/
        $this->call(AudEventsTableSeeder::class);
    }
}
