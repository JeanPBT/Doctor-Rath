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

class QuienesSomosController extends Controller
{
    public function web_quienes_somos(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(1))->get();
    	return view('web.pages.web_quienes_somos')->with(compact('data_'));
    }
}