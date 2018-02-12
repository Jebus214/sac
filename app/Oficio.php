<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficio extends Model
{
    //
    
 protected $fillable = [
'no_oficio', 'remitente_c','remitente_e','remitente_id', 'destinatario_id', 'autor_id', 'user_id', 'fecha_emision', 'asunto','descripcion', 'archivo','seguimiento','contestacion'
 ];


 protected $appends =['origen','destino','dependenciao','areadestino','remitenteresponse'];
  
  
  public function getOrigenAttribute() {
    if($this->remitentes!=null){
        if ($this->remitentes->area_id==0) {
             return $this->remitentes->dependencia->nombre;  
        }
        else{
            return $this->remitentes->area->nombre;    
        }

    }
    else{
        return "";
    }
        
    }

public function getDependenciaoAttribute() {
    if($this->remitentes!=null)
        return $this->remitentes->dependencia->nombre;
    else
        return "";
    }



public function getRemitenteresponseAttribute() {

    ///en este contexto $this hace referencia a uan instancia del modelo Oficios
             $remitenteInterno=$this->remitentes;
            $responseData =["remitenteExterno"=>$this->remitente_e,"remitenteCiudadano"=>$this->remitente_c,"remitenteInterno"=>$remitenteInterno];
            return $responseData;

     
    }





  public function getDestinoAttribute() {
        if($this->destinatarios!=null)
            return $this->destinatarios[0]->dependencia_id;
    }



  public function getAreadestinoAttribute() {
        if($this->destinatarios!=null){


            if ($this->destinatarios[0]->area_id==0) {
                  return $this->destinatarios[0]->dependenciap;

               }

                return $this->destinatarios[0]->area_id;
            }
        
 



    }



    public function remitentes() {

            ///en este contexto $this hace referencia a uan instancia del atributo remitentes

        return $this->belongsTo(Persona::class,'remitente_id');
    }

    public function destinatarios() {
        return $this->belongsToMany(Persona::class,'destinatarios','oficio_id','persona_id')->withPivot('id','recibido','estado','revisar')->withTimestamps();
    }


    public function cpersona() {
        return $this->belongsToMany(Persona::class,'copias','oficio_id','persona_id')->withPivot('id','recibido','estado','revisar')->withTimestamps();
    }

     public function seguimientos() {
        return $this->belongsToMany(Seguimiento::class,'oficio_seguimiento','id_oficio','id_seguimiento')->withTimestamps();
    }

    

    


      public function autor() {
        return $this->belongsTo(Autor::class);
     }

      public function user() {
        return $this->belongsTo(User::class);
    }

    public function anexos() {
        return $this->hasMany(Anexo::class);
    }

    public function dependencia()
    {
        return $this->belongsToMany(Dependencia::class,'dependencia_oficio','oficio_id','dependencia_id')->withTimestamps();
    }

    public function area()
    {
        return $this->hasManyThrough('App\Area', 'App\User');
    }

    

}
