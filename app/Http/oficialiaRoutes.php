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


Route::get('oficialia/captura', ['middleware' => ['web','oficialia'],function () {
    return view('op.captura');
}]);



Route::get('oficialia/informacion', ['middleware' => ['web','oficialia'],function () {
    return view('op.informes');
}]);



Route::get('oficialia/capturados',['middleware'=>['web','oficialia'],function(){


     
        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->get();

        //$filtered=$oficios->where('dependenciao',$area);
        
        //$res = $filtered->values();

          
         return response()->json($oficios);


}]);



Route::get('oficialia/detalle/{id}', ['middleware' => ['web','oficialia'],function ($id) {

     $oficios=Oficio::with('destinatarios','cpersona','seguimientos')->findOrFail($id);


     $seguimiento=Seguimiento::with('oficios')->where('no_oficio',$oficios->no_oficio)->first();
 

     return view('op.detalle', [
         'oficios' => $oficios,'seguimientos'=>$seguimiento
    ]);


    
}]);

