<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;
class Subarea extends Model
{
    protected $fillable=[
        'COD_SUBAREA',
        'NOM_SUBAREA',
        'DESC_SUBAREA',
        'area_id',
        'NOMBRE_AREA'
    ];
    public function subareas()
    {
        return $this->hasMany(Area::class);
    }
}
