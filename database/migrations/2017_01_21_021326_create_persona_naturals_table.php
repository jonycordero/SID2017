<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaNaturalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_naturals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direcion',50);
            $table->timestamps();
            
            //$table->integer('personas_id')->unsigned();
            //$table->foreign('personas_id')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_naturals');
    }
}
