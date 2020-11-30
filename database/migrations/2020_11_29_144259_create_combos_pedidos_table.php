<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombosPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combos_pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pedido_id')->unsigned();            
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->bigInteger('combo_id')->unsigned();            
            $table->foreign('combo_id')->references('id')->on('combos');
            $table->integer('cantidad'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combos_pedidos');
    }
}
