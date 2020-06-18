<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'Code' =>'admin',
        	'Name' => 'Administrador',
        	'LastName' => 'Sistema',
        	'Email' => 'admin@admin.com',
        	'Password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
        ]);
        $user->roles()->attach(1);
    }
}
