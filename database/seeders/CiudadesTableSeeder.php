<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('ciudades')->insert([
            ['nombre' => 'Londres', 'moneda_local' => 'Libra Esterlina', 'simbolo_moneda' => '£', 'tasa_cambio' => 0.00024],
            ['nombre' => 'New York', 'moneda_local' => 'Dólar Estadounidense', 'simbolo_moneda' => '$', 'tasa_cambio' => 0.00026],
            ['nombre' => 'Paris', 'moneda_local' => 'Euro', 'simbolo_moneda' => '€', 'tasa_cambio' => 0.00024],
            ['nombre' => 'Tokyo', 'moneda_local' => 'Yen Japonés', 'simbolo_moneda' => '¥', 'tasa_cambio' => 0.036],
            ['nombre' => 'Madrid', 'moneda_local' => 'Euro', 'simbolo_moneda' => '€', 'tasa_cambio' => 0.00024],
        ]);
    }
}
