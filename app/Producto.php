<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Producto extends Model
{


    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'peso_neto',
        'peso_caja',
        'presentacion',
        'img',
        'categoria_id',
        'especificacion_id',
    ];

     public static function query_producto(){
        return DB::table('productos')
            ->join('categorias','categorias.id','=','productos.categoria_id')
            ->join('especificacions','especificacions.id','=','productos.especificacion_id')
            ->select('productos.id','productos.codigo','productos.nombre as p_nombre','categorias.nombre as c_nombre','productos.presentacion')
            ->get();

    }
     public static function query_show_producto($id){
        return DB::table('productos')
            ->join('categorias','categorias.id','=','productos.categoria_id')
            ->join('especificacions','especificacions.id','=','productos.especificacion_id')
            ->select('productos.id','productos.codigo','productos.nombre as p_nombre','productos.peso_neto','productos.peso_caja','productos.presentacion','especificacions.id as especificacion_id','especificacions.descripcion as e_nombre','categorias.id','categorias.nombre as c_nombre','productos.descripcion')
            ->where('productos.id','=',$id)
            ->get();

    }
}
