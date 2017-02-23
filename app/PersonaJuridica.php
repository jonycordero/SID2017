<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PersonaJuridica extends Model
{
   protected $fillable = [

        'ruc',
        'razon_social',
        'direccion',
        'email',
        'tipo',
        'personas_id',
    ];

//'dni', 'nombre', 'apellido_paterno','apellido_materno',

     public static function query_PersonaJuridica(){
        return DB::table('persona_juridicas')
            ->join('Personas','Personas.id','=','persona_juridicas.personas_id')
            ->select('persona_juridicas.id as PersonaJuridica_id','Personas.id as persona_id','Personas.dni','Personas.nombre','Personas.apellido_paterno','Personas.apellido_materno','persona_juridicas.ruc','persona_juridicas.razon_social','persona_juridicas.direccion','persona_juridicas.email','persona_juridicas.tipo')
            ->get();

    }

         public static function query_Edit_PersonaJuridica($id){
        return DB::table('persona_juridicas')
            ->join('Personas','Personas.id','=','persona_juridicas.personas_id')
            ->select('persona_juridicas.id as PersonaJuridica_id','Personas.id as persona_id','Personas.dni','Personas.nombre','Personas.apellido_paterno','Personas.apellido_materno','persona_juridicas.ruc','persona_juridicas.razon_social','persona_juridicas.direccion','persona_juridicas.email','persona_juridicas.tipo')
            ->where('persona_juridicas.id','=',$id)
            ->get();

    }
}
