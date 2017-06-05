<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
  protected $fillable = ['no_oficio'];

     public function oficios() {
        return $this->belongsToMany(Oficio::class,'oficio_seguimiento','id_seguimiento','id_oficio')->withTimestamps();
    }

    

}
