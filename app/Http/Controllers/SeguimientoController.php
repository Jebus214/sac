<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Seguimiento;
use App\Http\Controllers\Controller;

class SeguimientoController extends Controller
{
        public function cargarNoOficio(Request $request){

       
                    $seg=Seguimiento::select('id', 'no_oficio')->get();

                    return response()->json($seg);
                        

            
    }

}
