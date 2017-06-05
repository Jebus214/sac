<?php

namespace App\Http\Controllers;
use Mail;
use File;
use Storage;
use Illuminate\Http\Request;
use App\Oficio;
use App\Seguimiento;
use App\Area;
use App\Anexo;
use App\Persona;
use App\Dependencia;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PersonaRepository;
use Illuminate\Support\Facades\Auth;

class PersonaRepositoryController extends Controller
{


    public function __construct(PersonaRepository $personas)
    {
        $this->middleware('web');
        $this->personas = $personas;
    }



        public function repoArea(Request $request,$area_id){

            $area=Area::find($area_id);
            return response()->json(['data' => $this->personas->forArea($area)]);

        }



        public function repoDependencia(Request $request,$dependencia_id){

            $depedencia=Dependencia::find($dependencia_id);
            return response()->json(['data' => $this->personas->forDependencia($depedencia)]);

        }


   
}
