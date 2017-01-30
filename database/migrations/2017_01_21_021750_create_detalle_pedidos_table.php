<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');        
            $table->timestamps();
            
            $table->integer('pedidos_id')->unsigned();
            $table->foreign('pedidos_id')->references('id')->on('pedidos');
            
            $table->integer('productos_id')->unsigned();
            $table->foreign('productos_id')->references('id')->on('productos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}
