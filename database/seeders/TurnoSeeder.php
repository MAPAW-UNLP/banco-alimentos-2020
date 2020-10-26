<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turno;
use App\Models\Horario;

class TurnoSeeder extends Seeder
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
        $turno = Turno::create([
            'id'=>1,
            'fechaHora'=>'2020-10-25 14:30:00',
            'horario_id'=>1,
            'cantTurnos'=>2,
            'turnosDisponibles'=>2
        ]);
        $turno = Turno::create([
            'id'=>2,
            'fechaHora'=>'2020-10-30 14:00:00',
            'horario_id'=>2,
            'cantTurnos'=>2,
            'turnosDisponibles'=>1
        ]);
        $turno = Turno::create([
            'id'=>3,
            'fechaHora'=>'2020-10-08 10:30:00',
            'horario_id'=>4,
            'cantTurnos'=>2,
            'turnosDisponibles'=>2,
        ]);
    }
}