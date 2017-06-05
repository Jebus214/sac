<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['nombre'];



   	public function user() {
        return $this->hasMany(User::class);
   }

    public function persona() {
        return $this->hasMany(Persona::class);
   }

     public function autor() {
        return $this->hasMany(Autor::class);
   }  



    public function documentoAsOrigen()
    {
        return $this->hasManyThrough('App\Oficio', 'App\Persona','area_id','remitente_id');
    }

     public function documentoAsDestino()
    {
        return $this->hasManyThrough('App\Oficio', 'App\Persona','area_id','destinatario_id');
    }
}
