<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Solicitud;

class SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $solicitud = Solicitud :: create([
            'id'=>1,
            'organizacion_id'=>1,
            'fecha'=>date('2020-10-05'),
            'estado'=>0
        ]);
        $solicitud = Solicitud :: create([
            'id'=>2,
            'organizacion_id'=>2,
            'fecha'=>date('2020-10-03'),
            'estado'=>0
        ]);        
    }
}
