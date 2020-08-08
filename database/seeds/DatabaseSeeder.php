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
        /*$this->call([
            ComponentsTableSeeder::class,
            PermissionsSeeder::class,
            RoleTableSeeder::class,
            UsersTableSeeder::class,
            ParGeneralsTableSeeder::class,
            ParCoursesTableSeeder::class,
            UsersParametersTableSeeder::class,
            CountriesTableSeeder::class,
            AudEventsTableSeeder::class,
            TimeZonesSeeder::class
        ]);*/
        $this->call(CompanyTypesSeeder::class);
    }
}
