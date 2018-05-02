<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubArea;
class Area extends Model
{
    protected $fillable=['COD_AREA',
    'NOMBRE_AREA',
    'DESC_AREA'];
    public function subareas()
    {
        return $this->belongsTo(SubArea::class);
    }
}
