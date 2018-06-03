<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Titulo;

class Profesional extends Model
{
    Use SoftDeletes;

    protected $table = 'profesional';
    protected $fillable=[
    'NOM_PROF',
    'AP_PAT_PROF',
    'AP_MAT_PROF',
    'titulo_id',
    'TELF_PROF',
    'CI_PROF',
    'Tipo',
    'CORREO_PROF',
    ];

    protected $dates=['delete_at'];
    public function proyecto()
    {
        return $this->belongsToMany(Proyecto::class,'motivo_profesional_proyecto','motivo_id','profesional_id','proyecto_id')->withTimestamps();
    }
    public function estudiante()
    {
        return $this->belongsToMany(Estudiante::class,'estudiante_profesionals')->withTimestamps();
    }
    public function area()
    {
        return $this->belongsToMany(Area::class,'estudiante_profesionals')->withTimestamps();
    }

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }
    public function getFullNameAttribute(){
      return $this->NOM_PROF.' '.$this->AP_PAT_PROF.' '.$this->AP_MAT_EST;
    }

    public function scopeNombre($query, $nombre){
      return $query->where(DB::raw("CONCAT(NOM_PROF, ' ', AP_PAT_PROF, ' ', AP_MAT_PROF)"),"LIKE", "%$nombre%");
    }

    public function scopeTitulo($query, $titulo){
      $t= Titulo::pluck('nombre');
      if($titulo= $t->get('nombre')){
       $query->where(titulo_id,'=', $t->get('id'));
     }
     dd($t);
    }
}
