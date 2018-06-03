<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Estudiante extends Model
{
    use SoftDeletes;
    protected $fillable=[
    'COD_SIS',
    'NOM_EST',
    'AP_PAT_EST',
    'AP_MAT_EST',
    'CI',
    'TELF',
    'CORRETO_EST'
   ];
   public function proyectos()
   {
       return $this->belongsToMany(Proyecto::class)->withTimestamps();
   }
   public function profesional()
   {
       return $this->belongsToMany(Profesional::class,'estudiante_profesionals')->withTimestamps();
   }
   public function getFullNameAttribute(){
     return $this->NOM_EST.' '.$this->AP_PAT_EST.' '.$this->AP_MAT_EST;
   }


   public function scopeBuscar($query, $cadena){
     return $query->where(DB::raw("CONCAT(NOM_EST, ' ', AP_PAT_EST, ' ', AP_MAT_EST, ' ',CI, ' ', COD_SIS )"), "LIKE", "%$cadena%");
   }
}
