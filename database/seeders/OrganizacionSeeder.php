<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rol;
use App\Models\Organizacione;
class OrganizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
    $orga = Organizacione::create([
        'id'=>1,
        'user_id'=>2,
        'nombre'=>'caritas',
        'barrio'=>'La Loma',
        'localidad'=>'La Plata',
        'telefono'=>'4124578',
        'direccion'=>'48 y 47',
        'personeria_juridica'=>1,
        'aval'=>1,
        'cantPers'=>15,
        'edad'=>8,
        'ayuda_alimentaria'=>0,
        'ayuda_financiera'=>0,
        'tipo_servicio'=>'Ni idea',
        'tarea'=>'Ni idea',
        'estado'=>1
    ]);
    $orga = Organizacione::create([
        'id'=>2,
        'user_id'=>4,
        'nombre'=>'el mercadito',
        'barrio'=>'Los hornos',
        'localidad'=>'La Plata',
        'telefono'=>'42342342',
        'direccion'=>'4 y 7',
        'personeria_juridica'=>1,
        'aval'=>1,
        'cantPers'=>15,
        'edad'=>8,
        'ayuda_alimentaria'=>0,
        'ayuda_financiera'=>0,
        'tipo_servicio'=>'Ni idea',
        'tarea'=>'Ni idea',
        'estado'=>1
    ]);
    }
}
