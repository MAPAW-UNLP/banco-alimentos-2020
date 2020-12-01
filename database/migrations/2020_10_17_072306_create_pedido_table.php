<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organizacion_id')->unsigned();
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');
            $table->bigInteger('turno_id')->unsigned();
            $table->foreign('turno_id')->references('id')->on('turnos');
            $table->integer('estado');
            $table->integer('combo_id');
            $table->integer('cantCombos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
