<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\products;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;
use File;
use Illuminate\Support\Facades\Hash;

class TerminosController extends Controller {

    public function index($id) {

      $rowData_ =  DB::table('web_terminos')->where("id_terminos", $id)->get(); 
      return view('admin.pages.terminos.index')->with(compact('rowData_'));
    }

  public function terminos_guardar(Request $request){    
    
      DB::beginTransaction();
      try {

        DB::table('web_terminos')->where("id_terminos",$request->id_terminos)->update(['terminos' => $request->txt_terminos]); 
          DB::commit();
          // all good
          return json_encode(['data' => 'Se guardo correctamente!','state' => 'ok']);
      } catch (\Exception $e) {
          DB::rollback();
          // something went wrong
          return json_encode(['data' =>  $e->getMessage(),'state' => 'error']);
      }

  }


public function general_imagen_terminos(Request $request) 
{        
    $file = $request->file('image');
    if($file){
        $filename  =  time() .'_'.$file->getClientOriginalName(); // name of file

        $path = "img/terminos";
        $file->move($path,$filename); // save to our local folder
      return $filename;
    }
}

     
}