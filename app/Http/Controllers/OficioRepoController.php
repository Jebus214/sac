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
use App\Repositories\OficioRepository;
use Illuminate\Support\Facades\Auth;

class OficioRepoController extends Controller
{


    public function __construct(OficioRepository $oficios)
    {
        $this->middleware('web');

        $this->oficios = $oficios;
    }


    public function repoUser(Request $request){


        return response()->json(['oficios' => $this->oficios->forUser(Auth::user())]);

    }


        public function repoArea(Request $request){

            $area=Area::find(Auth::user()->area_id);
            return response()->json(['data' => $this->oficios->forArea($area)]);

        }



        public function repoDependenciaEnviados(Request $request){

            $dependencia_id=Auth::user()->dependencia_id;

            $depedencia=Dependencia::find($dependencia_id);

            return response()->json(['data' => $this->oficios->forDependencia($depedencia)]);

        }


        public function repoDependenciaBuzon(Request $request){
        
            $dependencia_id=Auth::user()->dependencia_id;

            $depedencia=Dependencia::find($dependencia_id);



            return response()->json($this->oficios->forDependenciaBuzon($depedencia));

        }



        public function repoAreaBuzon(Request $request){
        
            $area_id=Auth::user()->area_id;

            $area=Area::find($area_id);

            return response()->json($this->oficios->forAreaBuzon($area));

        }






   
}
