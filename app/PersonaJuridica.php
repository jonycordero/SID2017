<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
