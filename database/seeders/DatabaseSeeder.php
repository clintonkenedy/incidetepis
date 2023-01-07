<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(OficinaSeeder::class);
        $this->call(IncidenciaSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(RolSeeder::class);
//        $this->call(DispositivoSeeder::class);

    }
}
