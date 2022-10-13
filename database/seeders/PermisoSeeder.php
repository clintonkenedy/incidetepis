<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos = [
            'ver-oficina',
            'crear-oficina',
            'editar-oficina',
            'borrar',
        ];

        foreach ($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
