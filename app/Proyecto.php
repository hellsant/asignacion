<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    Use SoftDeletes;

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

    protected $dates=['delete_at'];
    
    public function modalidad()
    {
        return $this->belongsTo(Modalidades::class);
    }
    
    public function profesional()
    {
        return $this->belongsToMany(Profesional::class,'motivo_profesional_proyecto','motivo_id');
    }
    public function estudiante(){
        return $this->belongsToMany(Estudiante::class);
    }
}