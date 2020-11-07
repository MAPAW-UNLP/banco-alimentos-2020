<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();            
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nombre');
            $table->string('telefono')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('localidad')->nullable();
            $table->string('personeria_juridica')->nullable();
            $table->string('aval')->nullable();
            $table->integer('cantPers')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('ayuda_alimentaria')->nullable();
            $table->integer('ayuda_financiera')->nullable();
            $table->text('tarea')->nullable();
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
        Schema::dropIfExists('organizaciones');
    }
}
