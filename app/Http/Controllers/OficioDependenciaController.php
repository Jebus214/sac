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

class OficioDependenciaController extends Controller
{
    //

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
                      $this->middleware('web');

    }




    public function oficioExiste(Request $request){


             if($request->ajax()){

                        $oficios=Oficio::where('no_oficio',$request->input('seguimiento'))->get();

                        if($oficios->count()==0)
                            return response()->json(['no_oficio'=>$request->input('seguimiento'),'status'=>"0"]);
                        else 
                            return response()->json(['no_oficio'=>$request->input('seguimiento'),'status'=>"1"]);

              }

    }



///////////////////////////////////////////////////////////////////////////////

public function changeStatusRecibir(Request $request)

    {
         //$area_id = intval(Auth::user()->area_id);
       

        $oficio=Oficio::findOrFail($request->input('id'));

        $pivot_id=$oficio->destinatarios->first()->pivot->id;


       
        $oficio->destinatarios()->newPivotStatement()->where('id', $pivot_id)->update(['recibido' => 2]);
    


        return response()->json(['id'=>$request->input('id'),'pivot_id'=>$pivot_id]);
    
    }


    public function updateFinalizarOficio(Request $request)

    {
        
         $area_id = intval(Auth::user()->area_id);
       

       $oficio=Oficio::findOrFail($request->input('id_oficio'));

       $oficio->destinatarios()->newPivotStatement()->where('oficio_id',$request->input('id_oficio'))->where('persona_id',$request->input('persona_id'))->update(['estado' => 1]);
       $oficio->destinatarios()->newPivotStatement()->where('oficio_id',$request->input('id_oficio'))->where('persona_id',$request->input('persona_id'))->update(['revisar' => 0]);


        return response()->json(['id'=>$request->input('id')]);
    
    }



    public function updateFinalizarCopia(Request $request)

    {
          

            $area_id = intval(Auth::user()->area_id);
       

       $oficio=Oficio::findOrFail($request->input('id_oficio'));

       $oficio->cpersona()->newPivotStatement()->where('oficio_id',$request->input('id_oficio'))->where('persona_id',$request->input('persona_id'))->update(['estado' => 1]);
       $oficio->cpersona()->newPivotStatement()->where('oficio_id',$request->input('id_oficio'))->where('persona_id',$request->input('persona_id'))->update(['revisar' => 0]);


        return response()->json(['id'=>$request->input('id')]);




    
    }

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
public function updateRecibido(Request $request)

    {
         $area_id = intval(Auth::user()->area_id);
       

        $oficio=Oficio::findOrFail($request->input('id'));

        $pivot_id=$oficio->destinatarios->where('id',$area_id)->first()->pivot->id;


        $oficio->destinatarios()->newPivotStatement()->where('id', $pivot_id)->update(['recibido' => 1]);



        return response()->json(['id'=>$request->input('id'),'pivot_id'=>$pivot_id]);
    
    }





    public function updateCopia(Request $request)

    {
          


         $area_id = intval(Auth::user()->area_id);

        $oficio=Oficio::findOrFail($request->input('id'));

        $pivot_id=$oficio->cpersona->where('id',$area_id)->first()->pivot->id;


        $oficio->cpersona()->newPivotStatement()->where('id', $pivot_id)->update(['recibido' => 1]);



        return response()->json(['id'=>$request->input('id'),'pivot_id'=>$pivot_id]);



    
    }

///////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////


 public function oficiosPendientes(Request $request)
    {
        
      $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('estado',0)->where('revisar',0)->where('recibido',1);

        })->get();
      


        $res=$oficios->values()->all();

        return response()->json($res);

    }

     public function cargarNoOficioPendiente(Request $request)
    {
        
      $oficios=Oficio::has('destinatarios')->select('id', 'no_oficio')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('estado',0)->where('recibido',1);

        })->get();
      
        $res=$oficios->values()->all();

        return response()->json($res);

    }
    
    


 public function getPendientesOficiosEspera(Request $request)
    {
        
      $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',1)->where('revisar',1)->where('estado',0);

        })->get();
      
        $res=$oficios->values()->all();

        return response()->json($res);

    }
    

    public function getPendientesCopiasEspera(Request $request)
    {
     
        $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {
        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',1)->where('revisar',1)->where('estado',0);

        })->get();
      
    
      
        //$res=$oficios->values()->all();


        return response()->json($copias);

    }


/////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////


 public function getOficiosRecibidos(Request $request)
    {
        
      $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',1)->where('revisar',0)->where('estado',0);

        })->get();
      
        $res=$oficios->values()->all();

        return response()->json($res);

    }
    

    public function getCopiasRecibidos(Request $request)
    {
     
        $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {
        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',1)->where('revisar',0)->where('estado',0);

        })->get();
      
    
      
        //$res=$oficios->values()->all();


        return response()->json($copias);

    }


/////////////////////////////////////////////////////////



    


     public function porRecibir(Request $request)
    {
        
      


      $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',0);

        })->get();
      

        
        



        $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',0);

        })->get()->toArray();
      

        foreach ($copias as $item) {
                 $oficios->push($item);
        }
      
        //$res=$oficios->values()->all();


        return response()->json($oficios);

    }






}

