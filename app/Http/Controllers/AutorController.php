<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Autor;


class AutorController extends Controller
{
    public function listarAutorPorDireccion()
    {

        $user = Auth::user();

        $area_id=$user->area_id;
        
         $autores=Autor::with('area')->where('area_id',$area_id)->get();

    

          
        return response()->json($autores->toArray());

    }
}
