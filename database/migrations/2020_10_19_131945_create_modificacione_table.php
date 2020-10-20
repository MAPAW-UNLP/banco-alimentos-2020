<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificacioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modificaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organizacion_id')->unsigned();            
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');
            $table->string('nombre');
            $table->string('barrio')->nullable();
            $table->string('localidad')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('personeria_juridica')->nullable();
            $table->string('aval')->nullable();
            $table->integer('cantPers')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('ayuda_alimentaria')->nullable();
            $table->integer('ayuda_financiera')->nullable();
            $table->string('tipo_servicio')->nullable();
            $table->string('tarea')->nullable();
            $table->integer('estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modificaciones');
    }
}
