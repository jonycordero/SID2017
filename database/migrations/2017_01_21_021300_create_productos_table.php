<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            //---------
            $table->string('codigo',6);
            $table->string('nombre',50);
            $table->string('descripcion',300);
            $table->string('presentacion',15);
            $table->decimal('peso_neto',6,2);
            $table->decimal('peso_caja',6,2);
            $table->string('img',200);
            $table->timestamps();       
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            //$table->integer('especificacion_id')->unsigned();
            //$table->foreign('especificacion_id')->references('id')->on('especificaciones');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}