<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Oficio;
use App\Seguimiento;
use App\Persona;
use App\Area;
use App\Dependencia;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('repoUserOficio','OficioRepoController@repoUser');
Route::get('repoDependencia','OficioRepoController@repoDependencia');
Route::get('repoArea','OficioRepoController@repoArea');
Route::get('repoPersona','OficioRepoController@repoPersona');
Route::post('existeOficio','OficioController@oficioExiste');



Route::get('testEnviados',['middleware'=>'web',function(){


        $user = Auth::user();
        $area_id=$user->area_id;
        $area=$user->dependencia->nombre;

        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->get();

        $filtered=$oficios->where('dependenciao',$area);
        
        $res = $filtered->values();

          
         return response()->json($res);


}]);







//oficios/---------------------------------------------
Route::resource('oficio','OficioController');
Route::get('detail/{id}','OficioController@detalle');




//-------------Update estados-----------------------------------------------//

Route::post('updateFinalizarOficio','OficioController@updateFinalizarOficio');
Route::post('updateFinalizarCopia','OficioController@updateFinalizarCopia');
Route::post('updateRevisarOficio','OficioController@updateRevisarOficio');
Route::post('updateRevisarCopia','OficioController@updateRevisarCopia');
Route::post('updateRecibido','OficioController@updateRecibido');
Route::post('updateCopia','OficioController@updateCopia');
Route::post('finalizarOficio','OficioController@updateRevisarOficio');
Route::post('finalizarCopia','OficioController@updateRevisarCopia');

//--------------------------------------------------------------------------/



//oficios Llamados json/-------------------------------------------------


Route::get('pendientesOficiosEspera','OficioController@getPendientesOficiosEspera');
Route::get('pendientesCopiasEspera','OficioController@getPendientesCopiasEspera');

Route::get('pendientesEsperaTam','OficioController@pendientesEsperaTam');
Route::get('revisionTam','OficioController@revisionTam');


Route::get('oficiosRecibidos','OficioController@getOficiosRecibidos');
Route::get('copiasRecibidos','OficioController@getCopiasRecibidos');


Route::get('oficiosPorRevisar','OficioController@oficiosPendientesRevisar');
Route::get('copiasPorRevisar','OficioController@copiasPendientesRevisar');

Route::get('oficiosPorRecibir','OficioController@oficiosPorRecibir');
Route::get('copiasPorRecibir','OficioController@copiasPorRecibir');



Route::get('oficiosRevision','OficioController@oficiosRevision');
Route::get('copiasRevision','OficioController@copiasRevision');


Route::get('cargarOficioEnviados','OficioController@enviados');
Route::get('oficiosFinalizados','OficioController@oficiosFinalizados');
Route::get('cargarOficiosRecibidos','OficioController@oficiosRecibidos');

Route::get('copiasFinalizados','OficioController@copiasFinalizados');
Route::get('cargarCopiasRecibidas','OficioController@copiasRecibidas');

Route::get('porRecibirTam','OficioController@porRecibirTam');
Route::get('RecibidosTam','OficioController@pendientesTam');

//---------------------------------------------------------------






//---------------------deprecated
Route::get('cargarOficio','OficioController@listing');
//Route::get('cargarOficioRecibidos','OficioController@recibidos');
Route::get('cargarNoOficio','OficioController@cargarNoOficioPendiente');
Route::get('porRecibir','OficioController@porRecibir');
Route::post('oficiosRecibirFinalizar','OficioController@recibirFinalizarOficio');
Route::post('copiasRecibirFinalizar','OficioController@recibirFinalizarCopia');
Route::post('oficioConfirmarFinalizar','OficioController@oficioConfirmarFinalizar');
Route::post('copiasConfirmarFinalizar','OficioController@copiasConfirmarFinalizar');



//--------------------------------


Route::get('detalle/{id}', function ($id) {

     $oficios=Oficio::with('destinatarios','cpersona','seguimientos')->findOrFail($id);

     $seguimiento=Seguimiento::with('oficios')->where('no_oficio',$oficios->no_oficio)->first();


   


  return view('detalle', [
         'oficios' => $oficios,'seguimientos'=>$seguimiento
     ]);


    // return response()->json($oficios);
});


Route::get('detalleNo/{no_oficio}', function ($no_oficio) {

      $oficios=Oficio::where('no_oficio',$no_oficio)->first();

      $seguimiento=Seguimiento::with('oficios')->where('no_oficio',$oficios->no_oficio)->first();

  
  return view('detalle', [
         'oficios' => $oficios,'seguimientos'=>$seguimiento
     ]);


           
        //return response()->json($seguimiento->oficios);


});
