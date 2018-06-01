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
            'GESTION_REGISTRO',
            'GESTION_LIMITE',
            'OBJ_GRAL',
            'OBJ_ESP',
            'DESCRIPCION',
            'FECHA_INI',
            'FECHA_DEF',
            'GESTION_PRORROGA',
            'modalidad_id'
    ];

    protected $dates=['delete_at'];
    
    public function modalidad()
    {
        return $this->belongsTo(Modalidades::class);
    }
    
    public function profesional()
    {
        return $this->belongsToMany(Profesional::class,'motivo_profesional_proyecto','motivo_id','profesional_id','proyecto_id')->withTimestamps();
    }
    public function estudiante(){
        return $this->belongsToMany(Estudiante::class)->withTimestamps();
    }
    public function area()
    {
        return $this->belongsToMany(Area::class,'area_proyecto')->withTimestamps();
    }
    public function subarea()
    {
        return $this->belongsToMany(Subarea::class)->withTimestamps();
    }
}
