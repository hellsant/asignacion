<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrera extends Model
{
    Use SoftDeletes;

    protected $fillable=[
    'COD_CARRERA',
    'NOM_CARRERA'];

    protected $dates=['delete_at'];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }
}
