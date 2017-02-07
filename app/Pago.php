<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Pago extends Model
{
    protected $fillable = [
        'monto_total', 'tipo_pago', 'estado_pago', 'descuento',  'monto_con_descuento',
    ];
}