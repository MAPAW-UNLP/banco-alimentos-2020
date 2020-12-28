<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Notificacion;
use App\Models\NotificacionAceptacion;
use App\Models\User;


class ProdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horarios= Horario::create([
            'id'=>1,
            'nombre'=>'08:00 - 08:30'
        ]);
        $horarios= Horario::create([
            'id'=>2,
            'nombre'=>'08:30 - 09:00'
        ]);
        $horarios= Horario::create([
            'id'=>3,
            'nombre'=>'09:00 - 09:30'
        ]);
        $horarios= Horario::create([
            'id'=>4,
            'nombre'=>'09:30 - 10:00'
        ]);
        $horarios= Horario::create([
            'id'=>5,
            'nombre'=>'10:00 - 10:30'
        ]);
        $horarios= Horario::create([
            'id'=>6,
            'nombre'=>'10:30 - 11:00'
        ]);
        $horarios= Horario::create([
            'id'=>7,
            'nombre'=>'11:00 - 11:30'
        ]);
        $horarios= Horario::create([
            'id'=>8,
            'nombre'=>'11:30 - 12:00'
        ]);
        $horarios= Horario::create([
            'id'=>9,
            'nombre'=>'12:00 - 12:30'
        ]);
        $horarios= Horario::create([
            'id'=>10,
            'nombre'=>'12:30 - 13:00'
        ]);
        $horarios= Horario::create([
            'id'=>11,
            'nombre'=>'13:00 - 13:30'
        ]);
        $horarios= Horario::create([
            'id'=>12,
            'nombre'=>'13:30 - 14:00'
        ]);
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
            $notificacion = Notificacion :: create([
                'id'=>1,
                'notificacion'=>"Esta es una notificación",
                'created_at'=>date('2020-10-05'),
                'updated_at'=>date('2020-10-05')
            ]); 
            $notificacion = NotificacionAceptacion :: create([
                'id'=>1,
                'notificacion'=>"Contenido que agrega Lucas.",
                'created_at'=>date('2020-10-05'),
                'updated_at'=>date('2020-10-05')
            ]); 

            $user1 = User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'apellido' => 'admin',
                'dni' => 12345678,
                'telefono' => 12345678,
                'password' => bcrypt('123456'),
                'estado' => 1
                ]);

                $role = Role::create(['name' => 'Admin']);
                $role->syncPermissions([4,5,6,7,8,9,10,11,12]);
                $user1->assignRole([$role->id]);
    }
}
