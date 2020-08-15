<?php

use Illuminate\Database\Seeder;
use App\{Country, State};
class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deparments = array(
			1  => 'AMAZONAS',
			2  => 'ANTIOQUIA',
			3  => 'ARAUCA',
			4  => 'ATLANTICO',
			5  => 'BOLIVAR',
			6  => 'BOYACA',
			7  => 'CALDAS',
			8  => 'CAQUETA',
			9  => 'CASANARE',
			10 => 'CAUCA',
			11 => 'CESAR',
			12 => 'CHOCO',
			13 => 'CORDOBA',
			14 => 'CUNDINAMARCA',
			15 => 'GUAINIA',
			16 => 'GUAJIRA',
			17 => 'GUAVIARE',
			18 => 'HUILA',
			19 => 'MAGDALENA',
			20 => 'META',
			21 => 'N SANTANDER',
			22 => 'NARINO',
			23 => 'PUTUMAYO',
			24 => 'QUINDIO',
			25 => 'RISARALDA',
			26 => 'SAN ANDRES',
			27 => 'SANTANDER',
			28 => 'SUCRE',
			29 => 'TOLIMA',
			30 => 'VALLE DEL CAUCA',
			31 => 'VAUPES',
			32 => 'VICHADA',
		);
		$country = Country::where('Name','Colombia')->first();
		foreach ($deparments as $key => $value) {
			$state = State::create(['Name' => $value, 'IdCountry' => $country->IdCountry]);
		}


    }
}
