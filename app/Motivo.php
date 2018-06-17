<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motivo extends Model
{
    Use SoftDeletes;
    protected $dates=['delete_at'];
    public function profesional()
    {
        return $this->belongsToMany(Profesional::class,'motivo_profesional_proyecto')->withPivot('profesional_id','proyecto_id', 'motivo_id')->withTimestamps();
    }
    public function proyecto()
    {
        return $this->belongsToMany(Proyecto::class,'motivo_profesional_proyecto')->withPivot('profesional_id','proyecto_id', 'motivo_id')->withTimestamps();
    }
}
