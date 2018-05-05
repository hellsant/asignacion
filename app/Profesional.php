<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class profesional extends Model
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
}
