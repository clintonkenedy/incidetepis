<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incidencia;
class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     *
     * @return void
     */
    public function run()
    {
        Incidencia::create(['nombre' => 'LA COMPUTADORA NO ENCIENDE']);
        Incidencia::create(['nombre' => 'PANTALLA AZUL']);
        Incidencia::create(['nombre' => 'SIN INTERNET']);
        Incidencia::create(['nombre' => 'LA PC SE REINICIA SOLA']);
        Incidencia::create(['nombre' => 'EL S.O. TIENE PAROS INESPERADOS']);
        Incidencia::create(['nombre' => 'EL CPU ENCIENDE PERO NO HAY VIDEO']);
        Incidencia::create(['nombre' => 'MONITOR DAÑADO']);
        Incidencia::create(['nombre' => 'INFECCION DE SOFTWARE']);
        Incidencia::create(['nombre' => 'EL CPU ENCIENDE PERO NO HAY VIDEO']);
        Incidencia::create(['nombre' => 'OTROS']);
    }
}
