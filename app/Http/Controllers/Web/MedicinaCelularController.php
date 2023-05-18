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

class MedicinaCelularController extends Controller
{
    public function web_medicinacelular(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(3))->get();
    	return view('web.pages.web_medicinacelular')->with(compact('data_'));
    }
}