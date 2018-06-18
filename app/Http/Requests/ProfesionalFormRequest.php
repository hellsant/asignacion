<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesionalFormRequest extends FormRequest
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
            'nombre'=>'required|string',
            'apellido_paterno'=>'required|string',
            'apellido_materno'=>'nullable|string',
            'telefono'=>'required|numeric',
            'ci'=>'required|numeric|unique:profesional,CI_PROF',
            'correo'=>'required|email'
        ];
    }
}
