<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteFormEditRequest extends FormRequest
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
          'telefono'=>'nullable|numeric',
          'ci'=>'required|numeric',
          'cod_sis'=>'required|numeric',
          'correo'=>'required|email'
        ];
    }
}
