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
| This route group applies the "web",'dependencia' middleware group to every route
| it contains. The "web",'dependencia' middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
 




Route::post('/dep/changeStatusRecibir','OficioDependenciaController@changeStatusRecibir');



Route::get('/dep/oficios','OficioRepoController@repoDependenciaBuzon');


Route::get('/dep/informacion', ['middleware' => ['web','dependencia'],function () {
    return view('dependencia.informes');
}]);


Route::get('/dep/captura', ['middleware' => ['web','dependencia'],function () {
    return view('dependencia.captura');
}]);




Route::get('/dep/detalle/{id}', ['middleware' => ['web','dependencia'],function ($id) {

     $oficios=Oficio::with('destinatarios','cpersona','seguimientos')->findOrFail($id);


     $seguimiento=Seguimiento::with('oficios')->where('no_oficio',$oficios->no_oficio)->first();
 

     return view('dependencia.detalle', [
         'oficios' => $oficios,'seguimientos'=>$seguimiento
    ]);


    
}]);