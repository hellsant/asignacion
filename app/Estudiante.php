<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
       return $this->belongsToMany(Proyecto::class);
   }
}
