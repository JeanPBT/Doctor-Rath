<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class ProfesionalesController extends Controller {

  public function admin_profesional() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(22))->get();
    return view('admin.pages.admin_profesional')->with(compact('data_'));
  }

  public function admin_profesional_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",22)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }
 
}