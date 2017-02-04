<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    //
    protected $fillable = [
        'nombre', 'tasa_descuento',
    ];
}
