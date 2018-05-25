<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
  public function profesional()
{
  return $this->belongsToMany(Profesional::class);
}
}
