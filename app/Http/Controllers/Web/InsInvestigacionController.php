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

class InsInvestigacionController extends Controller
{
    public function web_investigacion(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(11))->get();
    	return view('web.pages.web_investigacion')->with(compact('data_'));
    }
}