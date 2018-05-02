<?php

namespace App;
use App\Modalidades;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable=[ 
            'TITULO_PERFIL',
            'FECHA_REGISTRO',
            'FECHA_LIMITE',
            'OBJ_GRAL',
            'OBJ_ESP',
            'DESCRIPCION',
            'FECHA_INI',
            'FECHA_DEF',
            'FECHA_PRORR',
            'modalidad_id'
    ];
    public function modalidad()
    {
        return $this->belongsTo(Modalidades::class);
    }
}
