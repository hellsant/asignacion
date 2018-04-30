<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable=[
    'COD_SIS',
    'NOM_EST',
    'AP_PAT_EST',
    'AP_MAT_EST',
    'CI',
    'TELF',
    'CORRETO_EST'
   ];
}
