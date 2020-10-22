<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turno;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turno = Turno::create([
            'id'=>1,
            'fechaHora'=>'2020-10-25 14:30:00',
            'cantTurnos'=>2,
            'turnosDisponibles'=>2
        ]);
        $turno = Turno::create([
            'id'=>2,
            'fechaHora'=>'2020-10-30 14:00:00',
            'cantTurnos'=>2,
            'turnosDisponibles'=>1
        ]);
        $turno = Turno::create([
            'id'=>3,
            'fechaHora'=>'2020-10-08 10:30:00',
            'cantTurnos'=>2,
            'turnosDisponibles'=>2,
        ]);
    }
}