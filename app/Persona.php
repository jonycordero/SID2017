<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    
    protected $fillable = [
        'dni', 'nombre', 'apellido_paterno','apellido_materno',
    ];
}
