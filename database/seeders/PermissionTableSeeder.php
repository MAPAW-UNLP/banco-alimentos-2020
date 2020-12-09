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
        'pedido-list',
        'rechazo-list',
        'turno-list',
        'combo-list'
        ];
        foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
        }
    }
}
