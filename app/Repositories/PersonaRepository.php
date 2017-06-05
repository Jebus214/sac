<?php

namespace App\Repositories;

use App\User;
use App\Area;
use App\Dependencia;
use App\Oficio;
use App\Persona;
use App\Repositories\OficioRepository;
use Illuminate\Support\Facades\Auth;


class PersonaRepository
{

    
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */


    public function forArea(Area $area)
    {
        return $area->persona()->orderBy('created_at', 'asc')->get();
    }

  
    public function forDependencia(Dependencia $dependencia)
    {
        return $dependencia->persona()->orderBy('created_at', 'asc')->get();
    }


}