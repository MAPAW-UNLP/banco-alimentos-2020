<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\CombosPedido;

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
            'organizacion_id'=>1,
            'turno_id'=>1,
            'estado' => 0
        ]);
        $pedido = Pedido::create([
            'id'=>2,
            'organizacion_id'=>2,
            'turno_id'=>2,
            'estado' => 0
        ]);
        $pedido = Pedido::create([
            'id'=>3,
            'organizacion_id'=>2,
            'estado' => 0
        ]);
        $combosPedido = CombosPedido::insert([
            'id'=>1,
            'pedido_id'=>1,
            'combo_id'=>1,
            'cantidad'=>3
        ]);
        $combosPedido = CombosPedido::insert([
            'id'=>2,
            'pedido_id'=>1,
            'combo_id'=>2,
            'cantidad'=>4
        ]);
        $combosPedido = CombosPedido::insert([
            'id'=>3,
            'pedido_id'=>1,
            'combo_id'=>5,
            'cantidad'=>5
        ]);
        $combosPedido = CombosPedido::insert([
            'id'=>4,
            'pedido_id'=>2,
            'combo_id'=>3,
            'cantidad'=>2
        ]);
    }
}
