<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaJuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_juridicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruc',11);
            $table->string('razon_social',50);
            $table->string('direccion',50);
            $table->string('email',50);
            $table->enum('tipo', ['cliente','proveedor']);
            $table->timestamps();
            
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_juridicas');
    }
}
