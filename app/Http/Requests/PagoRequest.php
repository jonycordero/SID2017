<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'monto_total' => 'required',
            'tipo_pago' => 'required',
            'estado_pago' => 'required',
            'descuento' => 'required',
            'monto_con_descuento' => 'required',
            //
        ];
    }
}
