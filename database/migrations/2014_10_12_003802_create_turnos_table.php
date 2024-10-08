<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->string('name');
            $table->time('horaingreso');
            $table->time('horasalida');
            // $table->unsignedTinyInteger('sucursal_id');
            // $table->foreign('sucursal_id')->on('sucursals')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
};
