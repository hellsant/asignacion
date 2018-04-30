<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesional extends Model
{
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
}
