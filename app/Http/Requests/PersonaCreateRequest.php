<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaCreateRequest extends FormRequest
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
            //
            'dni' => 'required|max:8',
            'nombre' => 'required|max:20',
            'apellido_paterno' => 'required|max:20',
            'apellido_materno' => 'required|max:20',
        ];
    }
}
