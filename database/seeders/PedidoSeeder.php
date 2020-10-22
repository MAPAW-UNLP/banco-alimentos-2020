<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedido = Pedido::create([
            'id'=>1,
            'combo_id'=>'1',
            'organizacion_id'=>1,
            'turno_id'=>1,
            'cantCombos'=>5,
        ]);
        $pedido = Pedido::create([
            'id'=>2,
            'combo_id'=>'3',
            'organizacion_id'=>2,
            'turno_id'=>2,
            'cantCombos'=>6,
        ]);
        $pedido = Pedido::create([
            'id'=>3,
            'combo_id'=>'4',
            'organizacion_id'=>2,
            'turno_id'=>3,
            'cantCombos'=>5,
        ]);
    }
}