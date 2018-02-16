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
use App\User;

use Illuminate\Http\Request;




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




Route::resource('direccion','DireccionController');
Route::get('cargarDireccion','DireccionController@listing');

Route::resource('persona','PersonaController');
Route::get('cargarPersona','PersonaController@listing');


Route::post('anexosUpload','UploadController@anexosUpload');





Route::post('upload','UploadController@upload');

Route::get('uploads/{dependencia}/{area}/{no_oficio}/{file}', function ($dependencia,$area,$no_oficio,$file) 
{

    $existe=Storage::disk('local')->exists('uploads/'.$file);
    $path=storage_path();

    $visibility=Storage::disk('local')->getVisibility( 'public');

    //(return response()->json(["path"=>$path  ,"visibilidad"=> $visibility,"Existe"=>$existe]);
   
    return response()->file($path.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$dependencia.DIRECTORY_SEPARATOR.$area.DIRECTORY_SEPARATOR.$no_oficio.DIRECTORY_SEPARATOR.$file);
    
});



Route::get('anexos/{area}/{no_oficio}/{file}', function ($area,$no_oficio,$file) {


    $path=storage_path();

    $visibility=Storage::disk('local')->getVisibility( 'public');

    //(return response()->json(["path"=>$path  ,"visibilidad"=> $visibility,"Existe"=>$existe]);
   
    return response()->file($path.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$area.DIRECTORY_SEPARATOR.$no_oficio.DIRECTORY_SEPARATOR.'anexos'.DIRECTORY_SEPARATOR.$file);
    
});

 

Route::get('preview/{file}', function ($file) {


    $existe=Storage::disk('local')->exists('temp/'.$file);
    $path=storage_path();

    $visibility=Storage::disk('local')->getVisibility( 'public');

    //(return response()->json(["path"=>$path  ,"visibilidad"=> $visibility,"Existe"=>$existe]);
   
    return response()->file($path.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."temp".DIRECTORY_SEPARATOR.$file);
    
});


Route::resource('dependencia','DependenciaController');
Route::resource('usuario','UsuarioController');
Route::get('cargarUsuario','UsuarioController@listing');


Route::get('adminUsuario', function () {
    return view('usuarios');
});

Route::get('adminDir', function () {
    return view('direcciones');
});

Route::get('adminAutor', function () {
    return view('autor');
});

Route::get('adminPersona', function () {
    return view('persona');
});




Route::group(['middleware' => ['web']], function () {



Route::get('cargarAutorDireccion','AutorController@listarPorDireccion');
Route::get('cargarPersonaDireccion','PersonaController@listarPorDireccion');
Route::get('cargarPersonaFilter','PersonaController@listarTodosExepto');
Route::get('cargarAutorDireccion','AutorController@listarAutorPorDireccion');



  Route::get('/',['middleware' => ['auth','perfil'],function () {
    return view('welcome');
}]);





Route::get('informes',['middleware' => 'auth', function () {
    return view('informes');
}]);



Route::get('perm/{id}', function ($id) {

        $persona= Persona::findOrFail($id);

        return $persona->email;

});



Route::get('mail2/{direccion}/{mensaje}', function ($direccion,$mensaje) {




    Mail::send('mail.mailtest', ['data'=>$mensaje], function ($message)  use ($direccion) {

        $message->from('correspondencia.interna@izcalli.gob.mx', 'Correspondencia');
        $message->to($direccion, "jesus");
        $message->subject('test');
          });

        return $direccion;


});





Route::get('date', function () {
  
 // $hora=date("h:i:s");
  $hora=date("B");

  $año=date("Y");
  $monthNumber=date("m");
  $mes=date("F");
  $dia=date("d");
  $diaF=date("jS");
  $fecha=date('l jS \of F Y h:i:s A');
  return response()->json(["dia"=>$dia,"mes"=>$monthNumber,"año"=>$año,"hora"=>$hora]);
});



Route::post('/pdfTest2/',function(Request $request){
  ini_set('max_execution_time', 300);
  ini_set('memory_limit','1000M');

  $pdf = App::make('dompdf.wrapper');

  //$pdf->setOptions([ "defaultPaperSize" => "letter","defaultMediaType" => "full"]);




  $doc=Oficio::newInstance($request->all());

  $pdf->setPaper('letter', 'portrait')->loadView('reenviarpdf', ['msg' =>$request->input('no_oficio') ]);
  
  //$pdf->loadView('cedula_template');

  if(!File::isDirectory('test'))
    $result = File::makeDirectory('test');

  $filename="myfile.pdf";


  $pdf->save($filename)->stream();

  return response()->json(["file"=>$filename]);


});






Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

    //
});

