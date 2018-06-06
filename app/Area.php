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

    public function subarea()
    {
        return $this->hasMany(Subarea::class);
    }
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class)->withTimestamps();
    }
    public function profesional()
    {
        return $this->belongsTo(Profesional::class)->withTimestamps();
    }
}
