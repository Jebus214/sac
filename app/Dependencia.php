<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
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

     public function area() {
        return $this->hasMany(Area::class);
   }  


    public function documentoAsOrigen()
    {
        return $this->hasManyThrough('App\Documento', 'App\Persona','direccion_id','remitente_id');
    }


    public function oficio(){
        return $this->belongsToMany(Oficio::class,'dependencia_oficio','dependencia_id','oficio_id')->withTimestamps();
    }

    public function oficioAsDestinatarios()
    {
        return $this->hasManyThrough('App\Oficio', 'App\Persona','dependencia_id','destinatario_id');
    }   

	
 
}
