<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles=[
            'Administrador',
            'Tecnico'
            ];

        foreach ($roles as $rol){
            //Role::create(['name'=>$rol]);
            $role=Role::create(['name'=>$rol]);
            $permisos = Permission::pluck('id','id')->all();
            $role->syncPermissions($permisos);

        }
        $usuarioadmin=User::first();
        $usuarioadmin->assignRole([$role->id]);

    }
}
