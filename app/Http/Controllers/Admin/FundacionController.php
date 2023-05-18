<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class FundacionController extends Controller {

  public function admin_fundacion() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(24))->get();
    return view('admin.pages.admin_fundacion')->with(compact('data_'));
  }

  public function admin_fundacion_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",24)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }
}