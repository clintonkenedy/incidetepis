<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incidencia;
class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incidencia::create(['nombre' => 'PROBLEMAS CON MI PC']);
        Incidencia::create(['nombre' => 'PROBLEMAS CON MI IMPRESORA']);
        Incidencia::create(['nombre' => 'PROBLEMAS CON TRAMITE DOCUMENTARIO']);
        Incidencia::create(['nombre' => 'OTROS']);
    }
}
