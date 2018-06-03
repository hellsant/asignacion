<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteFormRequest extends FormRequest
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
          'nombre'=>'required|alpha',
          'apellido_paterno'=>'required|alpha',
          'apellido_materno'=>'nullable|alpha',
          'telefono'=>'required|numeric',
          'ci'=>'required|numeric|unique:estudiantes,CI',
          'cod_sis'=>'required|numeric|unique:estudiantes,COD_SIS',
          'correo'=>'required|email'
        ];
    }
}
