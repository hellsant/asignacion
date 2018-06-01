<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profesional extends Model
{
    Use SoftDeletes;

    protected $table = 'profesional';
    protected $fillable=[
    'NOM_PROF',
    'AP_PAT_PROF',
    'AP_MAT_PROF',
    'titulo_id',
    'TELF_PROF',
    'CI_PROF',
    'NOM_CUENTA',
    'Tipo',
    'CORREO_PROF',
    ];

    protected $dates=['delete_at'];
    public function proyecto()
    {
        return $this->belongsToMany(Proyecto::class,'motivo_profesional_proyecto','motivo_id','profesional_id','proyecto_id')->withTimestamps();
    }
    public function estudiante()
    {
        return $this->belongsToMany(Estudiante::class,'estudiante_profesionals')->withTimestamps();
    }
    public function area()
    {
        return $this->belongsToMany(Area::class,'area_profesional')->withTimestamps();
    }

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }
    public function subarea()
    {
        return $this->belongsToMany(Subarea::class,'profesional_subarea')->withTimestamps();
    }
}
