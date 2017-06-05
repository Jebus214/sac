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
 
   Route::get('oficialia/user', ['middleware' => 'web',function () {


   return response()->json( ["user"=> Auth::user()]);


  }]);


   Route::get('testOficio', ['middleware' => 'web',function () {
  //$area=Area::has('documentoAsOrigen')->with('documentoAsOrigen')->get();
  //$oficio=Oficio::has('destinatarios')->with('destinatarios')->get();

  // return response()->json($oficios=Dependencia::find(Auth::user()->dependencia_id)->oficioAsDestinatarios()->orderBy('created_at', 'asc')->get());

      $oficios=Oficio::has('destinatarios')->whereHas('destinatarios', function ($query) {

        $query->where('dependencia_id', 14);

        })->get();
      

 return response()->json($oficios);

   return response()->json(  $dependencia=Dependencia::find(Auth::user()->dependencia_id)->persona()->first()->oficioAsDestinatarios()->orderBy('created_at', 'asc')->get());

  // return response()->json( Persona::find($persona_id)->oficioAsDestinatarios()->orderBy('created_at', 'asc')->get());


  // return response()->json( $area=Area::find(Auth::user()->area_id)->documentoAsDestino()->orderBy('created_at', 'asc')->get());
 //return response()->json(Auth::user()->oficio()->orderBy('created_at', 'asc')->get());

  }]);


Route::get('testMenu',  ['middleware' => 'web',function () {
    return view('test');
}]);


Route::get('captura', ['middleware' => ['web','oficialia'],function () {
    return view('op.captura');
}]);



Route::get('info', ['middleware' => ['web','oficialia'],function () {
    return view('op.informes');
}]);





Route::post('turnar','TestController@turnar');







Route::post('/dependencia/oficios','OficioRepoController@repoDependencia');
