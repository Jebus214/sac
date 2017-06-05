<?php

namespace App\Repositories;

use App\User;
use App\Area;
use App\Dependencia;
use App\Oficio;
use App\Persona;
use App\Repositories\OficioRepository;
use Illuminate\Support\Facades\Auth;



class OficioRepository
{

    
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
//oficio enviados

    public function forPersona(Persona $persona)
    {
        return $persona->oficioAsDestinatarios()->orderBy('created_at', 'asc')->get();
    }


    public function forUser(User $user)
    {
        return $user->oficio()->orderBy('created_at', 'asc')->get();
    }

  


    public function forDependencia(Dependencia $dependencia)
    {
        
        $dependenciaNombre=$dependencia->nombre;

        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->get();

        $filtered=$oficios->where('dependenciao',$dependenciaNombre);
        
        $res = $filtered->values();

          
         return $res;


    }


    public function forDependenciaBuzon(Dependencia $dependencia)
    {
        
        $dependencia_id=$dependencia->id;

        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->get();

        $filtered=$oficios->where('destino',$dependencia_id);
        
        $res = $filtered->values();

          
         return $res;


    }


    public function forArea(Area $area)
    {


        
        return $area->persona()->first()->oficioAsDestinatarios()->orderBy('created_at', 'asc')->get();
 

    }

    public function forAreaBuzon(Area $area)
    {
        
        $area_id=$area->id;

        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->get();

        $filtered=$oficios->where('areadestino',$area_id);
        
        $res = $filtered->values();

          
         return $res;


    }



}