<?php

namespace App\Http\Controllers;
use Mail;
use File;
use Storage;
use Illuminate\Http\Request;
use App\Oficio;
use App\Seguimiento;
use App\Anexo;
use App\Persona;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\OficioRepository;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    //

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function turnar(Request $request)

    {

      

            $doc=Oficio::findOrFail($id);
            $clavesDestinatarios= json_decode('[' .$request->input('destinatario_id'). ']', true);
            $doc->destinatarios()->attach($clavesDestinatarios);   
            return response()->json(['mensaje'=>'editado']);
        
        // $res=$request->all();
        // Oficio::findOrFail($id)->update($res);
        
    
    }


   
}

