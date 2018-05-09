<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Area;
class Subarea extends Model
{
    Use SoftDeletes;

    protected $fillable=[
        'COD_SUBAREA',
        'NOM_SUBAREA',
        'DESC_SUBAREA',
        'area_id',
        'NOMBRE_AREA'
    ];
    
    protected $dates=['delete_at'];
    
    public function subareas()
    {
        return $this->hasMany(Area::class);
    }
}
