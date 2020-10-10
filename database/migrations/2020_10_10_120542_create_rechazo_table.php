<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechazoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechazos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organizacion_id')->unsigned();            
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');
            $table->timestamp('fecha')->useCurrent();
            $table->string('motivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rechazos');
    }
}
