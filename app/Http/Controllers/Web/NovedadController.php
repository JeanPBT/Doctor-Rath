<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Session;
//ENVIAR CORREOS
use Mail;
use App\Mail\EnviarCorreosInfo;

class NovedadController extends Controller
{
    public function viewHome(){
        $slider_ = DB::table('web_home')->whereIn('id_home', array(6, 21,22,23))->get();
    	return view('web.pages.index')->with(compact('slider_'));
    }



}