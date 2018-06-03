<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class PerfilesFormRequest extends FormRequest
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
            'titulo'=> 'required',
            'objetivo_general'=> 'required',
            'objetivos_especificos'=> 'required',
            'descripcion'=> 'required',
            'fecha_registro'=> 'required|date|before_or_equal:today',
            'gestion_registro'=> 'required|',
            'gestion_limite'=> 'required',
        ];
    }
}
