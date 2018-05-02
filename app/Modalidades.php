<?php

namespace App;
use App\Proyecto;

use Illuminate\Database\Eloquent\Model;

class Modalidades extends Model
{
    protected $fillable=[
        'NOM',
        'DESC'
    ];
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }
}
