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
use App\User;
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



Route::post('/admin/changeStatusEnviar','OficioadminController@changeStatusEnviar');
Route::post('/admin/updateTurnado','OficioadminController@updateTurnado');




Route::get('admin/informacion', ['middleware' => ['web','admin'],function () {
    return view('admin.informes');
}]);



Route::get('admin/detalle/{id}', ['middleware' => ['web','admin'],function ($id) {

     $oficios=Oficio::with('destinatarios','cpersona','seguimientos')->findOrFail($id);


     $seguimiento=Seguimiento::with('oficios')->where('no_oficio',$oficios->no_oficio)->first();
 

     return view('admin.detalle', [
         'oficios' => $oficios,'seguimientos'=>$seguimiento
    ]);


    
}]);


Route::get('admin/capturados',['middleware'=>['web','admin'],function(){


     
        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->get();

        //$filtered=$oficios->where('dependenciao',$area);
        
        //$res = $filtered->values();

          
         return response()->json($oficios);


}]);


Route::get('admin/capturados',['middleware'=>['web','admin'],function(){

             $oficios=Oficio::with('remitentes','destinatarios','cpersona')->where('remitente_id', '>', '0')->get();
        //$filtered=$oficios->where('dependenciao',$area);
        //$res = $filtered->values();         
         return response()->json($oficios);

}]);


Route::get('admin/capturadosExterior',['middleware'=>['web','admin'],function(){


     
        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->where([
    ['remitente_id', '=', '0'],
    ['remitente_e', '<>', ''],
])->get();

        //$filtered=$oficios->where('dependenciao',$area);
        
        //$res = $filtered->values();

          
         return response()->json($oficios);


}]);


Route::get('admin/capturadosCiudadano',['middleware'=>['web','admin'],function(){


     
        $oficios=Oficio::with('remitentes','destinatarios','cpersona')->where([
    ['remitente_id', '=', '0'],
    ['remitente_c', '<>', ''],
])->get();

        //$filtered=$oficios->where('dependenciao',$area);
        
        //$res = $filtered->values();

          
         return response()->json($oficios);


}]);






