<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rol;
use App\Models\Organizacione;
use App\Models\CantPersonasEdads;
use App\Models\CantPersonasServicios;
use App\Models\CantRacionesDias;


class OrganizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*----Caritas---*/

        $orga = Organizacione::create([
            'id'=>1,
            'user_id'=>2,
            'nombre'=>'caritas',
            'domicilio'=>'La Loma',
            'localidad'=>'La Plata',
            'telefono'=>'4124578',
            'personeria_juridica'=>1,
            'aval'=>1,
            'txt_aval'=>'txt_aval',
            'ayuda_alimentaria'=>0,
            'ayuda_financiera'=>0,
            'tarea'=>'-',
            'estado'=>1
        ]);

        $cantPersEdad=CantPersonasEdads::insert(
            [   'id'=>1,
                'organizacion_id'=>1,
                'rango'=>1,
                'cant'=>5]
        );
        $cantPersEdad=CantPersonasEdads::insert(
            [   'id'=>2,
                'organizacion_id'=>1,
                'rango'=>2,
                'cant'=>5]
        );
        $cantPersEdad=CantPersonasEdads::insert(
            [   'id'=>3,
                'organizacion_id'=>1,
                'rango'=>3,
                'cant'=>5]
        );
        $cantPersEdad=CantPersonasEdads::insert(
            [   'id'=>4,
                'organizacion_id'=>1,
                'rango'=>4,
                'cant'=>5]
        );
        $cantPersEdad=CantPersonasEdads::insert(
            [   'id'=>5,
                'organizacion_id'=>1,
                'rango'=>5,
                'cant'=>5]
        );
        $cantPersEdad=CantPersonasEdads::insert(
            [   'id'=>14,
                'organizacion_id'=>1,
                'rango'=>7,
                'cant'=>5]
        );
        $cantPerServ=CantPersonasServicios::insert(
            ['id'=>1,
                'organizacion_id'=>1,
                'dia'=>1,
                'cant'=>5]

        );
        $cantPerServ=CantPersonasServicios::insert(
            ['id'=>2,
                'organizacion_id'=>1,
                'dia'=>2,
                'cant'=>5]
        );
        $cantPerServ=CantPersonasServicios::insert(
            ['id'=>3,
                'organizacion_id'=>1,
                'dia'=>3,
                'cant'=>5]
        );
        $cantPerServ=CantPersonasServicios::insert(
            ['id'=>4,
                'organizacion_id'=>1,
                'dia'=>4,
                'cant'=>5]
        );
        $cantPerServ=CantPersonasServicios::insert(
            ['id'=>5,
                'organizacion_id'=>1,
                'dia'=>5,
                'cant'=>5]
        );
        $cantRacionesDias =CantRacionesDias::insert(
            ['id'=>1,
            'organizacion_id'=>1,
            'comida'=>1,
            'lunes'=>1,
            'martes'=>1,
            'miercoles'=>1,
            'jueves'=>1,
            'viernes'=>1,
            'sabado'=>1,
            'domingo'=>1,
            'desde'=>'08:00',
            'hasta'=>'10:00'
            ]
        );
        $cantRacionesDias =CantRacionesDias::insert(
            ['id'=>2,
            'organizacion_id'=>1,
            'comida'=>2,
            'lunes'=>1,
            'martes'=>1,
            'miercoles'=>1,
            'jueves'=>1,
            'viernes'=>1,
            'sabado'=>1,
            'domingo'=>1,
            'desde'=>'08:00',
            'hasta'=>'10:00'
            ]
        );
        $cantRacionesDias =CantRacionesDias::insert(
            ['id'=>3,
            'organizacion_id'=>1,
            'comida'=>3,
            'lunes'=>1,
            'martes'=>1,
            'miercoles'=>1,
            'jueves'=>1,
            'viernes'=>1,
            'sabado'=>1,
            'domingo'=>1,
            'desde'=>'08:00',
            'hasta'=>'10:00'
            ]
        );
        $cantRacionesDias =CantRacionesDias::insert(
            ['id'=>4,
            'organizacion_id'=>1,
            'comida'=>4,
            'lunes'=>1,
            'martes'=>1,
            'miercoles'=>1,
            'jueves'=>1,
            'viernes'=>1,
            'sabado'=>1,
            'domingo'=>1,
            'desde'=>'08:00',
            'hasta'=>'10:00'
            ]
        );



    /* El mercadito */
    $orga = Organizacione::create([
        'id'=>2,
        'user_id'=>4,
        'nombre'=>'el mercadito',
        'domicilio'=>'Los Hornos',
        'localidad'=>'La Plata',
        'telefono'=>'42342342',
        'personeria_juridica'=>1,
        'aval'=>1,
        'cantPers'=>15,
        'edad'=>8,
        'ayuda_alimentaria'=>0,
        'ayuda_financiera'=>0,
        'tarea'=>'-',
        'estado'=>1
    ]);
    $cantPersEdad=CantPersonasEdads::insert(
        [   'id'=>7,
            'organizacion_id'=>2,
            'rango'=>1,
            'cant'=>5]
    );
    $cantPersEdad=CantPersonasEdads::insert(
        [   'id'=>8,
            'organizacion_id'=>2,
            'rango'=>2,
            'cant'=>5]
    );
    $cantPersEdad=CantPersonasEdads::insert(
        [   'id'=>9,
            'organizacion_id'=>2,
            'rango'=>3,
            'cant'=>5]
    );
    $cantPersEdad=CantPersonasEdads::insert(
        [   'id'=>10,
            'organizacion_id'=>2,
            'rango'=>4,
            'cant'=>5]
    );
    $cantPersEdad=CantPersonasEdads::insert(
        [   'id'=>11,
            'organizacion_id'=>2,
            'rango'=>5,
            'cant'=>5]
    );
    $cantPersEdad=CantPersonasEdads::insert(
        [   'id'=>12,
            'organizacion_id'=>2,
            'rango'=>6,
            'cant'=>5]
    );
    $cantPersEdad=CantPersonasEdads::insert(
        [   'id'=>13,
            'organizacion_id'=>2,
            'rango'=>7,
            'cant'=>5]
    );
    $cantPerServ=CantPersonasServicios::insert(
        ['id'=>6,
            'organizacion_id'=>2,
            'dia'=>1,
            'cant'=>5]

    );
    $cantPerServ=CantPersonasServicios::insert(
        ['id'=>7,
            'organizacion_id'=>2,
            'dia'=>2,
            'cant'=>5]
    );
    $cantPerServ=CantPersonasServicios::insert(
        ['id'=>8,
            'organizacion_id'=>2,
            'dia'=>3,
            'cant'=>5]
    );
    $cantPerServ=CantPersonasServicios::insert(
        ['id'=>9,
            'organizacion_id'=>2,
            'dia'=>4,
            'cant'=>5]
    );
    $cantPerServ=CantPersonasServicios::insert(
        ['id'=>10,
            'organizacion_id'=>2,
            'dia'=>5,
            'cant'=>5]
    );
    $cantRacionesDias =CantRacionesDias::insert(
        ['id'=>5,
        'organizacion_id'=>2,
        'comida'=>1,
        'lunes'=>1,
        'martes'=>1,
        'miercoles'=>1,
        'jueves'=>1,
        'viernes'=>1,
        'sabado'=>1,
        'domingo'=>1,
        'desde'=>'08:00',
        'hasta'=>'10:00'
        ]
    );
    $cantRacionesDias =CantRacionesDias::insert(
        ['id'=>6,
        'organizacion_id'=>2,
        'comida'=>2,
        'lunes'=>1,
        'martes'=>1,
        'miercoles'=>1,
        'jueves'=>1,
        'viernes'=>1,
        'sabado'=>1,
        'domingo'=>1,
        'desde'=>'08:00',
        'hasta'=>'10:00'
        ]
    );
    $cantRacionesDias =CantRacionesDias::insert(
        ['id'=>7,
        'organizacion_id'=>2,
        'comida'=>3,
        'lunes'=>1,
        'martes'=>1,
        'miercoles'=>1,
        'jueves'=>1,
        'viernes'=>1,
        'sabado'=>1,
        'domingo'=>1,
        'desde'=>'08:00',
        'hasta'=>'10:00'
        ]
    );
    $cantRacionesDias =CantRacionesDias::insert(
        ['id'=>8,
        'organizacion_id'=>2,
        'comida'=>4,
        'lunes'=>1,
        'martes'=>1,
        'miercoles'=>1,
        'jueves'=>1,
        'viernes'=>1,
        'sabado'=>1,
        'domingo'=>1,
        'desde'=>'08:00',
        'hasta'=>'10:00'
        ]
    );

    }
}
