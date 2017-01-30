<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_registros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad_buena');
            $table->integer('cantidad_mala');
            $table->decimal('precio_compra',4,2);
            $table->decimal('precia_venta',4,2);
            $table->date('fecha_caducidad');
            $table->timestamps();
            
            $table->integer('productos_id')->unsigned();
            $table->foreign('productos_id')->references('id')->on('productos');
            
            $table->integer('registros_id')->unsigned();
            $table->foreign('registros_id')->references('id')->on('registros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_registros');
    }
}
