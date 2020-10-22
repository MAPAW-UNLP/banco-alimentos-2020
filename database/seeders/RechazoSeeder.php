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
            'id_organizacion'=>1,
            'fecha'=>2020-10-05,
            'motivo'=>'No cumple con los requisitos'
        ]);
        $rechazo = Rechazo::create([
            'id'=>2,
            'id_organizacion'=>2,
            'fecha'=>2020-10-03,
            'motivo'=>'No cumple con los requisitos'
        ]);
        $rechazo = Rechazo::create([
            'id'=>3,
            'id_organizacion'=>3,
            'fecha'=>2020-08-05,
            'motivo'=>'No cumple con los requisitos'
        ]);
    }
}    