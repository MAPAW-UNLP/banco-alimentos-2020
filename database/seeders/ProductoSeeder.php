<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = Producto::create([
            'id'=>1,
            'combo_id'=>1,
            'producto'=>'Harina',
            'cantidad'=>1000,
        ]);
        $producto = Producto::create([
            'id'=>2,
            'combo_id'=>2,
            'producto'=>'Fideos',
            'cantidad'=>500,
        ]);
        $producto = Producto::create([
            'id'=>3,
            'combo_id'=>3,
            'producto'=>'Salsa de tomate',
            'cantidad'=>700,
        ]);
    }
}