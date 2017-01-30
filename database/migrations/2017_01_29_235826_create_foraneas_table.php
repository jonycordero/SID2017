<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForaneasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
        $table->integer('personas_id')->unsigned();
            $table->foreign('personas_id')->references('id')->on('personas');
        });
        
        Schema::table('productos', function (Blueprint $table) {
        $table->integer('especificacion_id')->unsigned();
        $table->foreign('especificacion_id')->references('id')->on('especificaciones');
        });
        
        Schema::table('persona_naturals', function (Blueprint $table) {
        $table->integer('personas_id')->unsigned();
        $table->foreign('personas_id')->references('id')->on('personas');
        });
        
        Schema::table('ventas', function (Blueprint $table) {
        $table->integer('persona_juridicas_id')->unsigned();
        $table->foreign('persona_juridicas_id')->references('id')->on('persona_juridicas');
        });
        
        Schema::table('detalle_pagos', function (Blueprint $table) {
        $table->integer('pagos_id')->unsigned();
        $table->foreign('pagos_id')->references('id')->on('pagos');
        });
        
        Schema::table('trabajadors', function (Blueprint $table) {
        $table->integer('personas_id')->unsigned();
        $table->foreign('personas_id')->references('id')->on('personas');
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
