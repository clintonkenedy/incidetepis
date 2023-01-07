<?php

namespace Database\Seeders;

use App\Models\Dispositivos;
use App\Models\Oficina;
use Illuminate\Database\Seeder;

class DispositivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        dispositivos::factory()->count(20)->create();
    }
}
