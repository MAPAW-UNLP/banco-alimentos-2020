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
            'fecha'=>2020-10-05
        ]);
        $solicitud = Solicitud :: create([
            'id'=>2,
            'organizacion_id'=>2,
            'fecha'=>2020-10-03
        ]);
        $solicitud = Solicitud :: create([
            'id'=>3,
            'organizacion_id'=>3,
            'fecha'=>2020-08-05
        ]);
        $solicitud = Solicitud :: create([
            'id'=>4,
            'organizacion_id'=>4,
            'fecha'=>2020-09-05
        ]);
        
    }
}
