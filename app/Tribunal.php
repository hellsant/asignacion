<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{

    public function listraTirbunales(){
        
        $trubunal = Proyecto::profesional;
        return $trubunal;
    }

    
}
