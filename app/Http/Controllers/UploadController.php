<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //
 public function confirmar( Request $request) {


        
        $fileName=$request->input('filename');
        
        if(!($exists = Storage::disk('local')->exists('temp'.DIRECTORY_SEPARATOR.$fileName)))
            {return response()->json(["mensaje"=>"temp file not found"]);}


        Storage::move('temp'.DIRECTORY_SEPARATOR.$fileName, 'uploads'.DIRECTORY_SEPARATOR.$fileName);
        Storage::delete('temp'.DIRECTORY_SEPARATOR.$fileName);

            return response()->json(["mensaje"=>"succes"]);

    }

    public function upload( Request $request) {

         $this->validate($request, [
        'no_oficio' => 'bail|required|unique:oficios,no_oficio|max:255'
    ]);


      if(!($request->hasFile('file'))){
                    return  response('{"error":"Error de archivo"}', 500);
        }


        $path=$request->file('file')->getRealPath();
        $extension = File::extension($request->file('file')->getClientOriginalName());

        Storage::put(
            'temp'.DIRECTORY_SEPARATOR.$request->input('no_oficio').DIRECTORY_SEPARATOR.$request->input('no_oficio').'.'.$extension,
            file_get_contents($path)
        );

        return response()->json(['mensajesss'=>$extension,'filesss'=>$request->file('file')->getClientOriginalName()]);

    }



    public function anexosUpload( Request $request) {


$anexos=$request->allFiles();


if($anexos==null)
   return  response('{"error":"Error en la subida de  archivos, intentarde nuevo"}', 500);


$files=$anexos['anexos'];


foreach ($files as  $file) {
    
        if(!($file->isValid())){
                    return  response('{"error":"Error en el archivo'.$file->getClientOriginalName().'"}', 500);
        }

        $path=$file->getRealPath();
        $extension = File::extension($file->getClientOriginalName());


        Storage::put(
             'temp'.DIRECTORY_SEPARATOR.$request->input('no_oficio').DIRECTORY_SEPARATOR.'anexos'.DIRECTORY_SEPARATOR.$file->getClientOriginalName().'.'.$extension,
            file_get_contents($path)
        );

    }
      /*



        $path=$request->file('file')->getRealPath();
        $extension = File::extension($request->file('file')->getClientOriginalName());

        Storage::put(
            'temp'.DIRECTORY_SEPARATOR.$request->input('no_oficio').'.'.$extension,
            file_get_contents($path)
        );*/


return response()->json(["message"=>"niceone"]);

//        return response()->json(['mensaje'=>"test",'request'=>]);

    }
}