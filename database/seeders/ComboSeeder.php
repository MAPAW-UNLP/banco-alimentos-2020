<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Combo;

class ComboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $combo = Combo::insert([
            'id'=>1,
            'nombre'=>'Combo 1',
            'stock'=>20,
            'cantOrg'=>4,
            'contribucion'=>100,
            'estado'=>1
        ]);

        $combo = Combo::insert([
            'id'=>2,
            'nombre'=>'Combo 2',
            'stock'=>20,
            'cantOrg'=>4,
            'contribucion'=>100,
            'estado'=>1
        ]);

        $combo = Combo::insert([
            'id'=>3,
            'nombre'=>'Combo 3',
            'stock'=>20,
            'cantOrg'=>4,
            'contribucion'=>100,
            'estado'=>1
        ]);

        $combo = Combo::insert([
            'id'=>4,
            'nombre'=>'Combo 4',
            'stock'=>60,
            'cantOrg'=>4,
            'contribucion'=>100,
            'estado'=>1
        ]);

        $combo = Combo::insert([
            'id'=>5,
            'nombre'=>'Combo 5',
            'stock'=>5,
            'cantOrg'=>5,
            'contribucion'=>500,
            'estado'=>0
        ]);
    }
}

