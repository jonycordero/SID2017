<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha');
            $table->integer('numero');
            $table->integer('serie');
            $table->timestamps();
            
            //$table->integer('persona_juridicas_id')->unsigned();
            //$table->foreign('persona_juridicas_id')->references('id')->on('persona_juridicas');
            
            $table->integer('persona_naturals_id')->unsigned();
            $table->foreign('persona_naturals_id')->references('id')->on('persona_naturals');
            
            $table->integer('trabajadors_id')->unsigned();
            $table->foreign('trabajadors_id')->references('id')->on('trabajadors');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
