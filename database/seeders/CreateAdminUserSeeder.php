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
        'password' => bcrypt('123456'),
        'estado' => 1
        ]);
        $userAdmin = User::create([
            'name' => 'administrador',
            'email' => 'admin@gmail.com',
            'apellido' => 'admin',
            'dni' => 12345678,
            'telefono' => 12345678,
            'password' => bcrypt('123456'),
            'estado' => 1
        ]);
        $user2 = User::create([
        'name' => 'Ejemplo Organizacion',
        'email' => 'ejemplo@organizacion.com',
        'apellido' => 'Org',
        'dni' => 31785,
        'telefono' => 31785,
        'password' => bcrypt('123456'),
        'estado' => 1
        ]);
        $user3 = User::create([
            'name' => 'Ejemplo Empleado',
            'email' => 'ejemplo2@empleado.com',
            'apellido' => 'empleado',
            'dni' => 31785,
            'telefono' => 31785,
            'password' => bcrypt('123456'),
            'estado' => 1
        ]);
        $user4 = User::create([
            'name' => 'Ejemplo2 Organizacion',
            'email' => 'ejemplo3@organizacion.com',
            'apellido' => 'Org',
            'dni' => 31785,
            'telefono' => 31785,
            'password' => bcrypt('123456'),
            'estado' => 1
        ]);
        $role=Role::create(['name' => 'Empleado']);
        $role->syncPermissions([8,9,10,11,12]);
        $role=Role::create(['name' => 'Voluntario gestión social']);
        $role->syncPermissions([8,10]);
        $role=Role::create(['name' => 'Voluntario almacén']);
        $role->syncPermissions([9,11,12]);
        $user3->assignRole([$role->id]);
        $role=Role::create(['name' => 'Organizacion']);
        $role->syncPermissions([1,2,3]);
        $user2->assignRole([$role->id]);
        $user4->assignRole([$role->id]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user1->assignRole([$role->id]);
        $userAdmin->assignRole([$role->id]);
    }
}
