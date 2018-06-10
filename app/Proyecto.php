<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


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
        return $this->belongsToMany(Profesional::class,'motivo_profesional_proyecto')->withPivot('profesional_id')->withTimestamps();
    }
    public function motivo()
    {
        return $this->belongsToMany(Motivo::class,'motivo_profesional_proyecto')->withPivot('motivo_id')->withTimestamps();
    }

    public function estudiante(){
        return $this->belongsToMany(Estudiante::class)->withTimestamps();
    }
    public function area()
    {
        return $this->belongsToMany(Area::class)->withTimestamps();
    }
    public function subarea()
    {
        return $this->belongsToMany(Subarea::class)->withTimestamps();
    }
    public function scopeNombre($query, $nombre){
      //return $query->where(DB::raw("CONCAT(NOM_PROF, ' ', AP_PAT_PROF, ' ', AP_MAT_PROF, ' ',CI_PROF, ' ' )"), "LIKE", "%$cadena%");
      return $query->where("TITULO_PERFIL", "LIKE", "%$nombre%");
    }
    public function scopeGestReg($query, $ges_reg){
      return $query->where("GESTION_REGISTRO", "LIKE", "%$ges_reg%");
    }
    public function scopeGestLim($query, $ges_lim){
      return $query->where("GESTION_REGISTRO", "LIKE", "%$ges_lim%");
    }
}
