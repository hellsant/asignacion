<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Subarea extends Model
{
  Use SoftDeletes;

  protected $fillable=[
      'COD_SUBAREA',
      'NOM_SUBAREA',
      'DESC_SUBAREA',
      'area_id',

  ];
  protected $dates=['delete_at'];

  public function area()
  {
      return $this->belongsTo(Area::class);
  }
  public function proyecto()
  {
      return $this->belongsToMany(Proyecto::class)->withTimestamps();
  }
}
