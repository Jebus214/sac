<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //


protected $fillable = [
'nombre', 'apaterno', 'amaterno', 'cargo','email','area_id','dependencia_id','fullname'
];

protected $appends = ['fullname','areap','dependenciap'];
 



  public function getFullnameAttribute() {

    return $this->nombre.' '.$this->apaterno.' '.$this->amaterno;


  }


    public function getAreapAttribute() {
      if($this->area!=null)
         return $this->area->nombre;


  }

      public function getDependenciapAttribute() {
      if($this->dependencia!=null)
         return $this->dependencia->nombre;


  }



    public function oficioAsRemitentes() {
        return $this->hasMany(Oficio::class, 'remitente_id');
    }

   

    public function oficioAsCpersona() {
        return $this->belongsToMany(Oficio::class,'copias','persona_id','oficio_id')->withPivot('id','recibido')->withTimestamps();
    }

     public function oficioAsDestinatarios() {
        return $this->belongsToMany(Oficio::class,'destinatarios','persona_id','oficio_id')->withPivot('id','recibido')->withTimestamps();
    }

     public function area() {
        return $this->belongsTo(Area::class);
    }

       public function dependencia() {
        return $this->belongsTo(Dependencia::class);
    }
}
  