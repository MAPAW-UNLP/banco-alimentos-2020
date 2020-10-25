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
        $user1 = User::create([
        'name' => 'Sebastian',
        'email' => 'sebastianesg@gmail.com',
        'apellido' => 'Sanchez',
        'dni' => 12345678,
        'telefono' => 12345678,
        'password' => bcrypt('123456')
        ]);
        $user2 = User::create([
        'name' => 'Ejemplo Organizacion',
        'email' => 'ejemplo@organizacion.com',
        'apellido' => 'Org',
        'dni' => 31785,
        'telefono' => 31785,
        'password' => bcrypt('123456')
        ]);
        $user3 = User::create([
            'name' => 'Ejemplo Empleado',
            'email' => 'ejemplo2@empleado.com',
            'apellido' => 'empleado',
            'dni' => 31785,
            'telefono' => 31785,
            'password' => bcrypt('123456')
        ]);  
        $user4 = User::create([
            'name' => 'Ejemplo2 Organizacion',
            'email' => 'ejemplo3@organizacion.com',
            'apellido' => 'Org',
            'dni' => 31785,
            'telefono' => 31785,
            'password' => bcrypt('123456')
        ]);
        $role=Role::create(['name' => 'Empleado']);
        $user3->assignRole([$role->id]);
        $role=Role::create(['name' => 'Organizacion']);
        $user2->assignRole([$role->id]);
        $user4->assignRole([$role->id]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user3->assignRole([$role->id]);
    }
}
