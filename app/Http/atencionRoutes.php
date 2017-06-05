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
 




Route::post('/atencion/changeStatusRecibir','OficioDependenciaController@changeStatusRecibir');



Route::get('/atencion/oficios','OficioRepoController@repoAreaBuzon');


Route::get('/atencion/informacion', ['middleware' => ['web','atencion'],function () {
    return view('atencion.informes');
}]);


Route::get('/atencion/captura', ['middleware' => ['web','atencion'],function () {
    return view('atencion.captura');
}]);




Route::get('/atencion/detalle/{id}', ['middleware' => ['web','atencion'],function ($id) {

     $oficios=Oficio::with('destinatarios','cpersona','seguimientos')->findOrFail($id);


     $seguimiento=Seguimiento::with('oficios')->where('no_oficio',$oficios->no_oficio)->first();
 

     return view('atencion.detalle', [
         'oficios' => $oficios,'seguimientos'=>$seguimiento
    ]);


    
}]);