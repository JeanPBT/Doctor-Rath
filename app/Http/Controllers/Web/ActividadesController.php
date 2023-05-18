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

class ActividadesController extends Controller
{
    public function web_actividad(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(21))->get();
    	return view('web.pages.actividad.web_actividad')->with(compact('data_'));
    }

    public function web_curso_basico(){
        $data_ = DB::table('web_codemirror')->whereIn('id', array(25))->get();
    	return view('web.pages.actividad.web_curso_basico')->with(compact('data_'));
    }


    public function web_servicios_all($id_servicio){

        $rowData_ = DB::table('web_servicio') ->where('web_servicio.id_servicio', '=', $id_servicio)->get();
        $rowData_opciones = DB::table('web_servicio_titulo')
        ->join('web_servicio_descripcion', 'web_servicio_titulo.id_titulo', '=', 'web_servicio_descripcion.id_titulo')
        ->join('web_servicio', 'web_servicio_titulo.id_servicio', '=', 'web_servicio.id_servicio')
        ->where('web_servicio.id_servicio', '=', $id_servicio)->get()->toArray();
    
        $result = array();
        foreach ($rowData_opciones as $element) {
            $result[$element->titulo_principal][] =  [
                "superior_titulo1"=>$element->superior_titulo1,
                "updated_at"=>$element->updated_at,
                "id_descripcion"=>$element->id_descripcion,
                "id_titulo"=>$element->id_titulo,
                "titulo_principal"=>$element->titulo_principal,
                "title"=>$element->title,
                "descripcion"=>$element->descripcion,
                "url_image"=>$element->url_image,
                "url_link"=>$element->url_link,
            ];
        }
    	return view('web.pages.actividad.web_servicios_all')
        ->with(compact('result'))
        ->with(compact('rowData_'));
    }


    public function viewServicioInfo(Request $request){
        $rowData = DB::table('web_servicio_descripcion')->where('web_servicio_descripcion.id_descripcion', '=',$request->id)->get();
    	return view('web.pages.actividad.web_servicios_all_info')->with(compact('rowData'));
    }

}