<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    //

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function listing()
    {

     $usuarios=User::with('dependencia','area')->get();

    

          
     return response()->json($usuarios->toArray());

    }


    public function index()
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
       

      //bcrypt();
$res=$request->all();
$res['password']=bcrypt($res['password']);

             if($request->ajax()){
            User::create($res);
            //return response()->json(['mensaje'=>$request->all()]);

                return response()->json(['mensaje'=>$res]);

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
        $emp=User::findOrFail($id);
        return response()->json($emp);

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
$res['password']=bcrypt($res['password']);


          User::findOrFail($id)->update($res);
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
           return response()->json(['mensaje'=>'Registro borrado']);
    }

}
