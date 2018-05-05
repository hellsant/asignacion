<?php

namespace App;
use App\Proyecto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modalidades extends Model
{
    Use SoftDeletes;

    protected $fillable=[
        'NOM',
        'DESC'
    ];

    protected $dates=['delete_at'];

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }
}
