<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class CreateAdminUserSeeder extends Seeder
{
        /**
        * Run the database seeds.
        *
        * @return void
        */
        public function run()
        {
        $user = User::create([
        'name' => 'Rahul Shukla',
        'email' => 'admin@admin.com',
        'apellido' => 'admin',
        'dni' => 31785,
        'telefono' => 31785,
        'password' => bcrypt('123456')
        ]);
        Role::create(['name' => 'Empleado']);
        Role::create(['name' => 'Organizacion']);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
