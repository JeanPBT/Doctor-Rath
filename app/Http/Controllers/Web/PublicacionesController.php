<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
//ENVIAR CORREOS
use Mail;
use App\Mail\EnviarCorreosInfo;

class PublicacionesController extends Controller
{
    public function web_publicacion($id_categoria){

        $web_publicaciones = DB::table('web_publicaciones')
                            // ->join('web_publicaciones_categoria', 'web_publicaciones.id_publicacion_categoria', '=', 'web_publicaciones_categoria.id_publicacion_categoria')
                            ->where('web_publicaciones.id_publicacion_categoria',$id_categoria)
                            ->get();

        return view('web.pages.publicacion.web_publicacion')
                ->with(compact('web_publicaciones'));
    }
 
    public function web_publicacion_link($id_publicacion){
         $data_ = DB::table('web_publicaciones')->where('id_publicacion', array($id_publicacion))->get();
        //  var_dump($data_);
        //  exit;
        if(Auth::check())
            return view('web.pages.publicacion.web_publicacion_link')->with(compact('data_'));
        else
             return json_encode(['data' =>  'Usted no tiene una cuenta, registrese','state' => 'login']);
    }

}