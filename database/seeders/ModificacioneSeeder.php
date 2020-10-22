<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modificacione;

class ModificacioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modificacione = Modificacione::create([
            'id'=>1,
            'organizacion_id'=>1,
            'nombre'=>'Rayito de Sol',
            'barrio'=>'La Plata',
            'localidad'=>'La Plata',
            'telefono'=>2211234563,
            'direccion'=>'Diag 79 123',
            'personeria_juridica'=>'0',
            'aval'=>'0',
            'cantPers'=>100,
            'edad'=>10,
            'ayuda_alimentaria'=>'0',
            'ayuda_financiera'=>'0',
            'tipo_servicio'=>'Almuerzo y Merienda',
            'tarea'=>'La organización distribuye 400 almuerzos y 750 meriendas diarias.',
            'estado'=>'0'
        ]);
        $modificacione = Modificacione::create([
            'id'=>2,
            'organizacion_id'=>1,
            'nombre'=>'El mercadito',
            'barrio'=>'Los Hornos',
            'localidad'=>'La Plata',
            'telefono'=>2211234563,
            'direccion'=>'Diag 71 897',
            'personeria_juridica'=>'1',
            'aval'=>'1',
            'cantPers'=>200,
            'edad'=>8,
            'ayuda_alimentaria'=>'0',
            'ayuda_financiera'=>'0',
            'tipo_servicio'=>'Almuerzo y cenas',
            'tarea'=>'La organización distribuye 500 almuerzos y 1000 cenas diarias.',
            'estado'=>'0'
        ]);
    }
}













