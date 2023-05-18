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

class LaAlianzaController extends Controller
{
    public function web_alianza(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(4))->get();
    	return view('web.pages.alianza.web_alianza')->with(compact('data_'));
    }

    public function web_mathias_rath(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(5))->get();
    	return view('web.pages.alianza.web_mathias_rath')->with(compact('data_'));
    }

    public function web_sustancias_vitales(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(7))->get();
    	return view('web.pages.alianza.web_sustancias_vitales')->with(compact('data_'));
    }

    public function web_productos_naturales(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(8))->get();
    	return view('web.pages.alianza.web_productos_naturales')->with(compact('data_'));
    }

    public function web_formacion(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(9))->get();
    	return view('web.pages.alianza.web_formacion')->with(compact('data_'));
    }

    public function web_grupo_barcelona(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(10))->get();
    	return view('web.pages.alianza.web_grupo_barcelona')->with(compact('data_'));
    }

}