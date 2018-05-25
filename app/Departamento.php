<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    public function carrera()
   {
       return $this->hasMany(Carrera::class);
   }
}
