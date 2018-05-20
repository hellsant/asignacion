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
    'TITULO_PROF',
    'TELF_PROF',
    'CI_PROF',
    'MON_CUENTA',
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
        return $this->belongsToMany(Area::class,'estudiante_profesionals')->withTimestamps();
    }
}
