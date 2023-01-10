<?php

namespace Database\Seeders;

use App\Models\Persona;
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
        Persona::create([
            'dni' => '180186',
            'celular' => '977117752',
            
        ]);
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(OficinaSeeder::class);
        $this->call(IncidenciaSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(RolSeeder::class);
//        $this->call(DispositivoSeeder::class);

    }
}
