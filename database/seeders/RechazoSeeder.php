<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rechazo;

class RechazoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rechazo = Rechazo::create([
            'id'=>1,
            'organizacion_id'=>1,
            'fecha'=>date('2020-10-22 00:03:45'),
            'motivo'=>'No cumple con los requisitos'
        ]);
        $rechazo = Rechazo::create([
            'id'=>2,
            'organizacion_id'=>2,
            'fecha'=>date('2020-10-22 00:03:45'),
            'motivo'=>'No cumple con los requisitos'
        ]);
    }
}    