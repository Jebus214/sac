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

class OficioController extends Controller
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

public function recibirFinalizarOficio(Request $request)

    {
         $area_id = intval(Auth::user()->area_id);
       

        $oficio=Oficio::findOrFail($request->input('id'));

        $pivot_id=$oficio->destinatarios->where('id',$area_id)->first()->pivot->id;


        $oficio->destinatarios()->newPivotStatement()->where('id', $pivot_id)->update(['estado' => 1]);
        $oficio->destinatarios()->newPivotStatement()->where('id', $pivot_id)->update(['recibido' => 1]);
    


        return response()->json(['id'=>$request->input('id'),'pivot_id'=>$pivot_id]);
    
    }


public function recibirFinalizarCopia(Request $request)

    {
     
        $area_id = intval(Auth::user()->area_id);

        $oficio=Oficio::findOrFail($request->input('id'));

        $pivot_id=$oficio->cpersona->where('id',$area_id)->first()->pivot->id;


        $oficio->cpersona()->newPivotStatement()->where('id', $pivot_id)->update(['recibido' => 1]);
        $oficio->cpersona()->newPivotStatement()->where('id', $pivot_id)->update(['estado' => 1]);


        return response()->json(['id'=>$request->input('id'),'pivot_id'=>$pivot_id]);

    
    }



////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////

public function updateRevisarOficio(Request $request)

    {
         $area_id = intval(Auth::user()->area_id);
       

        $oficio=Oficio::findOrFail($request->input('id'));

        $pivot_id=$oficio->destinatarios->where('id',$area_id)->first()->pivot->id;


        $oficio->destinatarios()->newPivotStatement()->where('id', $pivot_id)->update(['revisar' => 1]);



        return response()->json(['id'=>$request->input('id'),'pivot_id'=>$pivot_id]);
    
    }


    public function updateRevisarCopia(Request $request)

    {
          


         $area_id = intval(Auth::user()->area_id);

        $oficio=Oficio::findOrFail($request->input('id'));

        $pivot_id=$oficio->cpersona->where('id',$area_id)->first()->pivot->id;


        $oficio->cpersona()->newPivotStatement()->where('id', $pivot_id)->update(['revisar' => 1]);



        return response()->json(['id'=>$request->input('id'),'pivot_id'=>$pivot_id]);



    
    }
///////////////////////////////////////////////////////////////////////////////

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

    public function listing()
    {


     $oficios=Oficio::with('remitentes','destinatarios')->get();

   

          
     return response()->json($oficios->toArray());

    }


  public function  detalle($id){

     $oficio=Oficio::with('destinatarios','cpersona')->findOrFail($id);
     return response()->json($oficio);


  }


    public function enviados(Request $request)
    {

        $user = Auth::user();
        $area_id=$user->area_id;
        $area=$user->area->nombre;

        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->get();

        $filtered=$oficios->where('origen',$area);
        
        $res = $filtered->values();

          
         return response()->json($res->toArray());

    }



    public function oficiosPendientesRevisar(Request $request)
    {
       
        $user = Auth::user();
        $area_id=$user->area_id;

       // $oficios=Oficio::has('destinatarios')->with('destinatarios')->where('remitente_id',$area_id)->get();

         $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('revisar',1);

        })->where('remitente_id',$area_id)->get();

        $res=collect();

        foreach ($oficios as $item) {
            
            $rel=$item['destinatarios'];            
            $no_oficio = $item['no_oficio'];
            $asunto = $item['asunto'];
            $fecha_emision=$item['fecha_emision'];
            $remitente=$item['remitentes']['fullname'];
            $remitente_id=$item['remitente_id'];

             foreach($rel as $pivotItem){
                  
                  $dest = $pivotItem['fullname'];
           

                  $oficioRel=$pivotItem['pivot'];
                  $oficioRel['no_oficio']=$no_oficio;
                  $oficioRel['destinatario']=$dest;
                  $oficioRel['asunto']=$asunto;
                  $oficioRel['fecha_emision']=$fecha_emision;
                  $oficioRel['remitente']=$remitente;
                  $oficioRel['remitente_id']=$remitente_id;

  
                  if ($oficioRel['revisar']==1) {
                       $res->push($oficioRel);

                  }


             } 

        }



        return response()->json($res);



    }


    public function copiasPendientesRevisar(Request $request)
    {

       
        $user = Auth::user();
        $area_id=$user->area_id;

       // $oficios=Oficio::has('destinatarios')->with('destinatarios')->where('remitente_id',$area_id)->get();

         $oficios=Oficio::has('cpersona')->with('cpersona.area')->whereHas('cpersona', function ($query) {

       
        $query->where('revisar',1);

        })->where('remitente_id',$area_id)->get();

        $res=collect();

        foreach ($oficios as $item) {
            
            $rel=$item['cpersona'];            
            $no_oficio = $item['no_oficio'];
            $asunto = $item['asunto'];
            $fecha_emision=$item['fecha_emision'];
            $remitente=$item['remitentes']['fullname'];
            $remitente_id=$item['remitente_id'];

             foreach($rel as $pivotItem){
                  
                  $dest = $pivotItem['fullname'];
           

                  $oficioRel=$pivotItem['pivot'];
                  $oficioRel['no_oficio']=$no_oficio;
                  $oficioRel['destinatario']=$dest;
                  $oficioRel['asunto']=$asunto;
                  $oficioRel['fecha_emision']=$fecha_emision;
                  $oficioRel['remitente']=$remitente;
                  $oficioRel['remitente_id']=$remitente_id;
  
  
                  if ($oficioRel['revisar']==1) {
                       $res->push($oficioRel);

                  }


             } 

        }

   

        return response()->json($res);



    }




 public function recibidos(Request $request)
    {


       

      $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',1);

        })->get();
      

        
        



        $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',1);

        })->get()->toArray();
      

        foreach ($copias as $item) {
                 $oficios->push($item);
        }
      
        //$res=$oficios->values()->all();


        return response()->json($oficios);

      

    }

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
        $query->where('estado',0)->where('recibido',2);

        })->get();
      
        $res=$oficios->values()->all();

        return response()->json($res);

    }
    
    

    public function copiasPendientes(Request $request)
    {
     
        $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {
        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('estado',0)->where('revisar',0)->where('recibido',1);

        })->get();
      
    
      
        //$res=$oficios->values()->all();


        return response()->json($copias);

    }


//////////////////////////////////////////////////////////////////////
 public function oficiosFinalizados(Request $request)
    {
        
      $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('estado',1);

        })->get();
      
        $res=$oficios->values()->all();

        return response()->json($res);

    }
    

    public function copiasFinalizados(Request $request)
    {
     
        $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {
        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('estado',1);

        })->get();
      
    
      
        //$res=$oficios->values()->all();


        return response()->json($copias);

    }



/////////////////////////////////////////////////////////////////


 public function pendientesTam(){

         $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('estado',0)->where('recibido',1)->where('revisar',0);

        })->get();
      
      
        $oficiosCount=$oficios->count();



   $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {
        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('estado',0)->where('recibido',1)->where('revisar',0);

        })->get();
      
    $copiasCount=$copias->count();
    $cuantos=$oficiosCount + $copiasCount;

        //$res=$oficios->values()->all();


        return response()->json(["cuantos"=>$cuantos,"oficiosCount"=>$oficiosCount,"copiasCount"=>$copiasCount]);


    }


    //////////////////////////////////////////////////////////////////////


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


    public function oficiosPorRecibir(Request $request)
    {
        
      $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',0);

        })->get();
      
        $res=$oficios->values()->all();

        return response()->json($res);

    }
    

    public function copiasPorRecibir(Request $request)
    {
        
      


      
      
        
        $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {
        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',0);

        })->get();
      

       
      
        //$res=$oficios->values()->all();


        return response()->json($copias);

    }


    


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




public function pendientesEsperaTam()
    {

    
        $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;

        $query->where('persona_id', $area_id)->where('recibido',1)->where('revisar',1)->where('estado',0);

        })->get();

        $oficiosCount=$oficios->count();


         $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {
        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',1)->where('revisar',1)->where('estado',0);

        })->get();
      
        $copiasCount=$copias->count();  


     
    
       
        
        return response()->json(["cuantos"=>$copiasCount+$oficiosCount,"oficiosCount"=>$oficiosCount,"copiasCount"=>$copiasCount]);

    }




public function revisionTam()
    {

    
           
        $user = Auth::user();
        $area_id=$user->area_id;



         $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('revisar',1);

        })->where('remitente_id',$area_id)->get();


        $oficiosCount=0;

        foreach ($oficios as $item) {
              $rel=$item['destinatarios'];   
             foreach($rel as $pivotItem){
                   $oficioRel=$pivotItem['pivot'];

                  if ($oficioRel['revisar']==1) {                       
                       $oficiosCount=$oficiosCount+1;
                  }


             } 

        }

         $copias=Oficio::has('cpersona')->with('cpersona.area')->whereHas('cpersona', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('revisar',1);

        })->where('remitente_id',$area_id)->get();


        $copiasCount=0;

        foreach ($copias as $item) {
              $rel=$item['cpersona'];   
             foreach($rel as $pivotItem){
                   $copiaRel=$pivotItem['pivot'];
                  if ($copiaRel['revisar']==1) {                       
                       $copiasCount=$copiasCount+1;
                  }


             } 

        }




     
    
       
        
        return response()->json(["cuantos"=>$copiasCount+$oficiosCount,"oficiosCount"=>$oficiosCount,"copiasCount"=>$copiasCount]);

    }


    public function porRecibirTam()
    {

    
        $oficios=Oficio::has('destinatarios')->with('destinatarios.area')->whereHas('destinatarios', function ($query) {

        $user = Auth::user();
        $area_id=$user->area_id;

        $query->where('persona_id', $area_id)->where('recibido',0);

        })->get();

        $oficiosCount=$oficios->count();


         $copias=Oficio::has('cpersona')->with('destinatarios','cpersona.area')->whereHas('cpersona', function ($query) {
        $user = Auth::user();
        $area_id=$user->area_id;
        $query->where('persona_id', $area_id)->where('recibido',0);

        })->get();
      
        $copiasCount=$copias->count();  


     
    
       
        
        return response()->json(["cuantos"=>$copiasCount+$oficiosCount,"oficiosCount"=>$oficiosCount,"copiasCount"=>$copiasCount]);

    }


    public function index()
    {
        //

        return view('oficios');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {




        $user = Auth::user();


      if ($request->input('remitente_id')==0){
        $dependencia=15;
        $area=47;
      }else{
         $remitente=Persona::findOrFail($request->input('remitente_id'));
         $dependencia=$remitente->dependencia_id;
         $area=$remitente->area_id;
      }
          

   $this->validate($request, [
        'no_oficio' => 'bail|required|unique:oficios,no_oficio|max:255',
              'remitente_id' => 'bail|required|numeric',
              'fecha_emision' => 'bail|required',
               'asunto' => 'bail|required'
    ]);

        $extension = File::extension($request->input('archivo'));

        $directoryName=$request->input('no_oficio');

        $fileName=$request->input('no_oficio').'.'.$extension;
        

        if(!($exists = Storage::disk('local')->exists('temp'.DIRECTORY_SEPARATOR.$directoryName)))
            {return response('{"error":["el archivo temporal  '.$fileName.'  no se encontro intente subir de nuevo el archivo"]}', 422);}

        
        $newDir='uploads'.DIRECTORY_SEPARATOR.$dependencia.DIRECTORY_SEPARATOR.$area.DIRECTORY_SEPARATOR.$directoryName;

        Storage::move('temp'.DIRECTORY_SEPARATOR.$directoryName,$newDir );
        //Storage::delete('temp/'.$fileName);

        $data=$request->all();
        $data['archivo']=$fileName.'pdf';
        $data['user_id']=$user->id;


          if($request->ajax()){
             $doc=Oficio::create($data);

            $seguimientoData=$data['no_oficio'];

            $seguimiento=Seguimiento::create(["no_oficio"=>$seguimientoData]);

           
            $directoryAnexos='uploads/'.$area.'/'.$directoryName.'/anexos/';
            $files = Storage::files($directoryAnexos);

            foreach ($files as $file) {
                $archivo=preg_split("[/]", $file);

                $anexo = new Anexo(array('archivo' => $archivo[sizeof($archivo)-1]));


                $doc->anexos()->save($anexo);


            }

            $clavesDestinatarios= json_decode('[' .$request->input('destinatario_id'). ']', true);
             $copia = $doc->destinatarios()->attach($clavesDestinatarios);   


            if($request->input('copia_id')!='null'){
             $claves= json_decode('[' .$request->input('copia_id'). ']', true);
             $copia = $doc->cpersona()->attach($claves);
            }


             if($request->input('seguimiento')!='null'){
                 $clavesSeg= json_decode('[' .$request->input('seguimiento'). ']', true);
                 $seg = $doc->seguimientos()->attach($clavesSeg);

             }

                $exp=true;


            
//Envio de correos
/*
          foreach ($doc->destinatarios as $destinatario) {
          

               if (isset($destinatario->email)){

                 Mail::send('mail.mailtest', ['documento'=>$doc], function ($message)  use ($destinatario) {

                   $message->from('correspondencia.interna@izcalli.gob.mx', 'Correspondencia');
                   $message->to($destinatario->email, $destinatario->nombre);
                   $message->subject("Sistema de correspondencia has recibido un nuevo oficio");
                 });
              }
            
            }
//

          foreach ($doc->cpersona as $copiaDestinatario) {
          

               if (isset($copiaDestinatario->email)){

                 Mail::send('mail.mailtest', ['documento'=>$doc], function ($message)  use ($copiaDestinatario) {

                   $message->from('correspondencia.interna@izcalli.gob.mx', 'Correspondencia');
                   $message->to($copiaDestinatario->email, $copiaDestinatario->nombre);
                   $message->subject("Sistema de correspondencia has recibido un nuevo oficio");
                 });
              }
            
            }

*/




if ($user->permisos!=1) {

     $pivot_id=$doc->destinatarios->first()->pivot->id;


       
        $doc->destinatarios()->newPivotStatement()->where('id', $pivot_id)->update(['recibido' => 1]);
    


}

            return response()->json(['mensaje'=>"Oficio Guardado","data"=>$doc]);

          }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $oficio=Oficio::findOrFail($id);
        return response()->json($oficio);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {

    
         $res=$request->all();
         Oficio::findOrFail($id)->update($res);
         return response()->json(['mensaje'=>'editado']);
    
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        User::findOrFail($id)->delete();
           return response()->json(['mensaje'=>'borrado']);
    }

}

