<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class ActividadesController extends Controller {

  public function admin_actividad() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(21))->get();
    return view('admin.pages.actividad.admin_actividad')->with(compact('data_'));
  }

  public function admin_actividad_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",21)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_curso_basico() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(25))->get();
    return view('admin.pages.actividad.admin_curso_basico')->with(compact('data_'));
  }

  public function admin_curso_basico_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",25)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }
 
}