<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_cuota');
            $table->decimal('monto_cuota',7,2);
            $table->datetime('fecha');
            $table->timestamps();
            
           // $table->integer('pagos_id')->unsigned();
           // $table->foreign('pagos_id')->references('id')->on('pagos');
            
            $table->integer('ventas_id')->unsigned();
            $table->foreign('ventas_id')->references('id')->on('ventas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pagos');
    }
}
