<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = Rol::create([
            'id'=>1,
            'nombre'=>'Empleado'
        ]);
        $rol = Rol::create([
            'id'=>2,
            'nombre'=>'Organizacion'
        ]);
        $rol = Rol::create([
            'id'=>3,
            'nombre'=>'Administrador'
        ]);
        $rol = Rol::create([
            'id'=>4,
            'nombre'=>'Responsable social'
        ]);
        $rol = Rol::create([
            'id'=>5,
            'nombre'=>'Responsable logístico'
        ]);
        $rol = Rol::create([
            'id'=>6,
            'nombre'=>'Voluntario'
        ]);
    }
}