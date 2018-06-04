<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\SubArea;
class Area extends Model
{
    Use SoftDeletes;

    protected $fillable=['COD_AREA',
    'NOMBRE_AREA',
    'DESC_AREA'];

    protected $dates=['delete_at'];
    
    public function subareas()
    {
        return $this->belongsTo(SubArea::class)->withTimestamps();
    }
    public function proyecto()
    {
        return $this->belongsToMany(Proyecto::class,'area_proyecto')->withTimestamps();
    }
    public function profesional()
    {
        return $this->belongsToMany(Profesional::class,'area_profesional')->withTimestamps();
    }
}
