<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monedas = [
        	['Name' => 'Euro', 'Symbol'=>'€','Prefix' => 'EUR'],
        	['Name' => 'Dolar','Symbol'=>'$','Prefix' => 'USD'],
        	['Name' => 'Pesos','Symbol'=>'$','Prefix' => 'COP']
        ];

        foreach ($monedas as $moneda) {
        	$currency = Currency::create($moneda);
        }
    }
}
