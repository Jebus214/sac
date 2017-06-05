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



Route::post('/gestion/changeStatusEnviar','OficioGestionController@changeStatusEnviar');
Route::post('/gestion/updateTurnado','OficioGestionController@updateTurnado');




Route::get('gestion/informacion', ['middleware' => ['web','gestion'],function () {
    return view('gestion.informes');
}]);



Route::get('gestion/detalle/{id}', ['middleware' => ['web','gestion'],function ($id) {

     $oficios=Oficio::with('destinatarios','cpersona','seguimientos')->findOrFail($id);


     $seguimiento=Seguimiento::with('oficios')->where('no_oficio',$oficios->no_oficio)->first();
 

     return view('gestion.detalle', [
         'oficios' => $oficios,'seguimientos'=>$seguimiento
    ]);


    
}]);


Route::get('gestion/capturados',['middleware'=>['web','gestion'],function(){


     
        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->get();

        //$filtered=$oficios->where('dependenciao',$area);
        
        //$res = $filtered->values();

          
         return response()->json($oficios);


}]);


Route::get('gestion/capturados',['middleware'=>['web','gestion'],function(){

             $oficios=Oficio::with('remitentes','destinatarios','cpersona')->where('remitente_id', '>', '0')->get();
        //$filtered=$oficios->where('dependenciao',$area);
        //$res = $filtered->values();         
         return response()->json($oficios);

}]);


Route::get('gestion/capturadosExterior',['middleware'=>['web','gestion'],function(){


     
        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->where([
    ['remitente_id', '=', '0'],
    ['remitente_e', '<>', ''],
])->get();

        //$filtered=$oficios->where('dependenciao',$area);
        
        //$res = $filtered->values();

          
         return response()->json($oficios);


}]);


Route::get('gestion/capturadosCiudadano',['middleware'=>['web','gestion'],function(){


     
        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->where([
    ['remitente_id', '=', '0'],
    ['remitente_c', '<>', ''],
])->get();

        //$filtered=$oficios->where('dependenciao',$area);
        
        //$res = $filtered->values();

          
         return response()->json($oficios);


}]);






