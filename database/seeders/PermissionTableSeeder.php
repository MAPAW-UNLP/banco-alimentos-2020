<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
        /**
        * Run the database seeds.
        *
        * @return void
        */
        public function run()
        {
        $permissions = [
        'orga-solicitar-combo',
        'orga-modificar-datos',
        'orga-mis-solicitudes',
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'organizacion-list',
        'organizacion-create',
        'organizacion-edit',
        'organizacion-delete',
        'pedido-list',
        'pedido-create',
        'pedido-edit',
        'pedido-delete',
        'rechazo-list',
        'rechazo-create',
        'rechazo-edit',
        'rechazo-delete',
        'turno-list',
        'turno-create',
        'turno-edit',
        'turno-delete',
        'combo-list',
        'combo-create',
        'combo-edit',
        'combo-delete'
        ];
        foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
        }
    }
}
