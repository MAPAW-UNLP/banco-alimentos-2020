<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cant_personas_servicios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organizacion_id')->unsigned();            
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');
            $table->integer('dia')->nullable();
            $table->integer('cant')->nullable();
        });
        Schema::create('cant_personas_edads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organizacion_id')->unsigned();            
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');
            $table->integer('rango')->nullable();
            $table->integer('cant')->nullable();
        });
        Schema::create('cant_raciones_dias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organizacion_id')->unsigned();            
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');
            $table->integer('comida')->nullable();
            $table->integer('lunes')->nullable();
            $table->integer('martes')->nullable();
            $table->integer('miercoles')->nullable();
            $table->integer('jueves')->nullable();
            $table->integer('viernes')->nullable();
            $table->string('rangoHorario')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aux');
    }
}
