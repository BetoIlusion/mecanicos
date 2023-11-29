<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Rol;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Cliente = Role::create(['name' => 'Cliente']);
        $PreTaller = Role::create(['name' => 'PreTaller']);
        $Taller = Role::create(['name' => 'Taller']);
        $Mecanico = Role::create(['name' => 'Tecnico']);
        

        Permission::create(['name'=>'Cliente'])->assignRole($Cliente);
        Permission::create(['name'=>'Taller'])->assignRole($Taller);
        Permission::create(['name'=>'Tecnico'])->syncRoles([$Taller,$Mecanico]);
        Permission::create(['name'=>'PreTaller'])->assignRole($PreTaller);
        

        Rol::create([
            'nombre_rol' => 'Cliente',
            'descripcion_rol' => 'Usuario Cliente de los Servicios',
        ]);
        Rol::create([
            'nombre_rol' => 'PreTaller',
            'descripcion_rol' => 'Usuario Taller antes de suscribirse',
        ]);
        Rol::create([
            'nombre_rol' => 'Taller',
            'descripcion_rol' => 'Usuario del Taller general',
        ]);
        Rol::create([
            'nombre_rol' => 'Tecnico',
            'descripcion_rol' => 'Usuario mecanico del taller',
        ]);
    }
}
