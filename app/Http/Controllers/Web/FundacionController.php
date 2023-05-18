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

class FundacionController extends Controller
{
    public function web_fundacion(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(24))->get();
    	return view('web.pages.web_fundacion')->with(compact('data_'));
    }
}