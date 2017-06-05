<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;

class PersonaController extends Controller
{


      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('superAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 public function listarPorDireccion()
    {

        $user = Auth::user();

        $area_id=$user->area_id;
        
         $personas=Persona::with('dependencia')->where('area_id',$area_id)->get();

    

          
        return response()->json($personas->toArray());

    }

        public function listarTodosExepto()
    {

/*         $personas=Persona::all();

        $filtered = $personas->reject(function ($item) {

        $user = Auth::user();

        $area_id=$user->area_id;
        
                return $item->area_id==$area_id;
            });

       
         return response()->json( $filtered->values()->all());
*/
      $personas=Persona::all();

    

          
     return response()->json($personas->toArray());


    }


       public function listing()
    {

      $personas=Persona::with('area')->get();

    

          
     return response()->json($personas->toArray());

    }


    public function index()
    {
        //

            $personas=Persona::all();

    

          
        return response()->json($personas->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          if($request->ajax()){
            Persona::create($request->all());
            return response()->json(['mensaje'=>$request->all()]);

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
        $dir=Persona::findOrFail($id);
        return response()->json($dir);

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
        
        Persona::findOrFail($id)->update($request->all());
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
     Persona::findOrFail($id)->delete();
           return response()->json(['mensaje'=>'borrado']);
    }
}
