<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class ServicioController extends Controller {

   //:::::::::::::::::::::::::: CRUD DE TITULOS ::::::::::::::::::::::::::
   public function adminServicioTitulo() {
    $rowData_cb_ = DB::table('web_servicio')->get();
    $rowData_ = DB::table('web_servicio_titulo')
    ->join('web_servicio', 'web_servicio_titulo.id_servicio', '=', 'web_servicio.id_servicio')
    ->orderBy('web_servicio_titulo.id_titulo', 'desc')
    ->get()->toArray();
    return view('admin.servicios.servicioTitulo')->with(compact('rowData_'))->with(compact('rowData_cb_'));
  }

  public function listarDataTableTitulo() {
    $rowData_ = DB::table('web_servicio_titulo')
    ->join('web_servicio', 'web_servicio_titulo.id_servicio', '=', 'web_servicio.id_servicio')
    ->get()->toArray();
    return view('admin.servicios.ajax.tablaTitulo')->with(compact('rowData_'));
  }

  public function servicioGrabarTitulo(Request $request) 
  {        
      switch($request->isValues) {
            case 'CREAR': 
                  $result = DB::table('web_servicio_titulo')->insert([
                            'id_servicio' => $request->txt_id_servicio, 
                            'titulo_principal' => $request->txt_titulo_principal, 
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' =>date("Y-m-d H:i:s")
                          ]);

                  return json_encode(['data' => 'Creado el registro correctamente!','state' => 'ok']);

                  break;

            case 'ACTUALIZAR': 
                  $result  =  DB::table('web_servicio_titulo')
                    ->where("id_titulo",$request->txt_id_titulo)
                    ->update([
                      'id_servicio' => $request->txt_id_servicio, 
                      'titulo_principal' => $request->txt_titulo_principal, 
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]); 
    
                    return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok']);

                  break;

            case 'ELIMINAR': 

                  DB::table('web_servicio_titulo')->where('id_titulo', '=', $request->txt_id_titulo)->delete();
                  return json_encode(['data' => 'Elimino el registro correctamente!','state' => 'ok']);

                break;
        }
  }

  public function servicioEditarTitulo(Request $request) {
    $result = DB::table('web_servicio_titulo')->where("id_titulo", $request->txt_id_titulo)->get();
    return json_encode($result);
  }

public function saveServiciosTraining(Request $request) 
{        
        DB::table('web_servicio')
        ->where("id_servicio",$request->txt_values)
        ->update([
          'superior_titulo1' => $request->superior_titulo1,
          'superior_titulo2' => $request->superior_titulo2,
          'inferior_titulo' => $request->inferior_titulo,
          'inferior_descripcion' => $request->inferior_descripcion,
        ]); 
        return back()->with('message','Se Actualizo');
}

public function imagenServiciosTraining(Request $request) 
{        
        $file = $request->file('image');

        switch($request->txt_values) {
          case 'superior': 
            
                if($file){
                  $url_imagen =  DB::table('web_servicio')->where('id_servicio', '=', $request->txt_id_home)->get();
                 
                  if(file_exists(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->superior_url_image))){
                    unlink(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->superior_url_image));
                  }
                  
                    $filename  =  time() .'_'.$file->getClientOriginalName(); 
                    $path = "template_admin/img";
                    $file->move($path,$filename); 
      
                    DB::table('web_servicio')
                      ->where("id_servicio",$request->txt_id_home)
                      ->update([
                      'superior_url_image' => '/template_admin/img/'.$filename, 
                      ]); 
    
                  }
                      $data=  DB::table('web_servicio')->where('id_servicio', '=', $request->txt_id_home)->get();
                      $html='';
                      $html.='
                      <img class="card-img-top" src="'.$data[0]->superior_url_image.'" alt="Photo">
                    ';
                    return [$html,$request->txt_values];//SI ES SUPERIOR O INFERIOR

                break;
          case 'inferior': 
            
            if($file){
              $url_imagen =  DB::table('web_servicio')->where('id_servicio', '=', $request->txt_id_home)->get();
             
              if(file_exists(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->inferior_url_image))){
                unlink(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->inferior_url_image));
              }
              
                $filename  =  time() .'_'.$file->getClientOriginalName(); 
                $path = "template_admin/img";
                $file->move($path,$filename); 
  
                DB::table('web_servicio')
                  ->where("id_servicio",$request->txt_id_home)
                  ->update([
                  'inferior_url_image' => '/template_admin/img/'.$filename, 
                  ]); 

              }
                  $data=  DB::table('web_servicio')->where('id_servicio', '=', $request->txt_id_home)->get();
                  $html='';
                  $html.='
                  <img class="card-img-top" src="'.$data[0]->inferior_url_image.'" alt="Photo">
                ';
                  return [$html,$request->txt_values];//SI ES SUPERIOR O INFERIOR

                  break;
          
      }
}


































  //:::::::::::::::::::::::::: CRUD DE SERVICIOS ::::::::::::::::::::::::::

  public function adminServicioHello() {
    $rowDataInfo = DB::table('web_servicio_descripcion')
    // ->where("id_descripcion",$request->txt_id_descripcion)
    ->get();

    $rowData_cb_ = DB::table('web_servicio')->get();
    $rowData_cb = DB::table('web_servicio_titulo')->get();
    $rowData_ = DB::table('web_servicio_titulo')
    ->join('web_servicio_descripcion', 'web_servicio_titulo.id_titulo', '=', 'web_servicio_descripcion.id_titulo')
    ->join('web_servicio', 'web_servicio_titulo.id_servicio', '=', 'web_servicio.id_servicio')
    ->get()->toArray();
    return view('admin.servicios.servicioHello')
    ->with(compact('rowData_'))
    ->with(compact('rowData_cb'))
    ->with(compact('rowDataInfo'))
    ->with(compact('rowData_cb_'));
  }

 public function createServicioTraining(Request $request) 
 {        
         switch($request->isValues) {
          case 'CREAR': 
            $file = $request->file('image');
            
            if($file != NULL){
                $filename  =  time() .'_'.$file->getClientOriginalName();
                $path = "template_admin/img/mc_charlas";
                $file->move($path,$filename);

                $result = DB::table('web_servicio_descripcion')->insert([
                    'id_titulo' => $request->txt_titulo_principal, 
                   
                    'title' => $request->txt_sub_titulo, 
                    'descripcion' => $request->txt_descripcion,
                    'url_image' => '/template_admin/img/mc_charlas/'.$filename, 
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' =>date("Y-m-d H:i:s")
                  ]);
                  return json_encode(['data' => 'Creado el registro correctamente!','state' => 'ok']);
            }else{
                  return json_encode(['data' => 'Error : subir imagen!','state' => 'error']);
                }

                break;
          case 'ACTUALIZAR': 
                  $file = $request->file('image');

                if($file != NULL){
                  $url_imagen =  DB::table('web_servicio_descripcion')->where('id_descripcion', '=', $request->txt_id_descripcion)->get();
                
                  if(file_exists(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image))){
                    unlink(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image));
                  }
                  
                    $filename  =  time() .'_'.$file->getClientOriginalName(); 
                    $path = "template_admin/img/mc_charlas";
                    $file->move($path,$filename); 
      
                    $result  =  DB::table('web_servicio_descripcion')
                      ->where("id_descripcion",$request->txt_id_descripcion)
                      ->update([

                        'id_titulo' => $request->txt_titulo_principal__, 
                        'title' => $request->txt_sub_titulo, 
                        'descripcion' => $request->txt_descripcion,
                        'url_image' => '/template_admin/img/mc_charlas/'.$filename, 
                        'updated_at' =>date("Y-m-d H:i:s")
                        
                      ]); 
     
                      return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src' => '/template_admin/img/mc_charlas/'.$filename]);

                  }else{
                    $result  =  DB::table('web_servicio_descripcion')
                    ->where("id_descripcion",$request->txt_id_descripcion)
                    ->update([

                      'id_titulo' => $request->txt_titulo_principal__, 
                      'title' => $request->txt_sub_titulo, 
                      'descripcion' => $request->txt_descripcion,
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]); 
                    return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok']);
                  }

                  break;

        case 'ELIMINAR': 

          DB::table('web_servicio_descripcion')->where('id_descripcion', '=', $request->txt_id_descripcion)->delete();
          return json_encode(['data' => 'Elimino el registro correctamente!','state' => 'ok']);

        break;

        case 'INFORMACION': 

          var_dump("aquiiiiiiiiiiiiii");
          var_dump($request->txt_id_descripcion);
          var_dump($request->info_url_image);
          var_dump($request->txt_sub_titulo);
          // exit();
          $file = $request->file('image');

        if($file != NULL){
          $url_imagen =  DB::table('web_servicio_descripcion')->where('id_descripcion', '=', $request->txt_id_descripcion)->get();
        
          if(file_exists(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->info_url_image))){
            unlink(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->info_url_image));
          }
          
            $filename  =  time() .'_'.$file->getClientOriginalName(); 
            $path = "template_admin/img/mc_charlas";
            $file->move($path,$filename); 

            $result  =  DB::table('web_servicio_descripcion')
              ->where("id_descripcion",$request->txt_id_descripcion)
              ->update([

                'info_titulo_heder' => $request->txt_info_titulo_heder, 
                'info_titulo_descripcion' => $request->txt_info_titulo_descripcion, 
                'info_titulo' => $request->txt_sub_titulo, 
                'info_descripcion' => $request->txt_descripcion,
                'info_url_image' => '/template_admin/img/mc_charlas/'.$filename, 
                'updated_at' =>date("Y-m-d H:i:s")
                
              ]); 

              return json_encode(['data' => 'Se registro correctamente!','state' => 'ok','src' => '/template_admin/img/mc_charlas/'.$filename]);

          }else{
            $result  =  DB::table('web_servicio_descripcion')
              ->where("id_descripcion",$request->txt_id_descripcion)
              ->update([

                'info_titulo_heder' => $request->txt_info_titulo_heder, 
                'info_titulo_descripcion' => $request->txt_info_titulo_descripcion, 
                'info_titulo' => $request->txt_sub_titulo, 
                'info_descripcion' => $request->txt_descripcion,
                'updated_at' =>date("Y-m-d H:i:s")
                
              ]); 
            return json_encode(['data' => 'Se registro correctamente!','state' => 'ok']);
          }

          break;

      }
 }

    public function editServicioTraining(Request $request) {
      $rowData_ = DB::table('web_servicio_titulo')
      ->join('web_servicio_descripcion', 'web_servicio_titulo.id_titulo', '=', 'web_servicio_descripcion.id_titulo')
      ->join('web_servicio', 'web_servicio_titulo.id_servicio', '=', 'web_servicio.id_servicio')
      ->where("web_servicio_descripcion.id_descripcion", $request->txt_id_descripcion)
      ->get()->toArray();
      return json_encode($rowData_);
    }

    public function listarDataTable(Request $request) {
      
      if(intval($request->txt_id_servicio) > 0){
        $rowData_ = DB::table('web_servicio_titulo')
        ->join('web_servicio_descripcion', 'web_servicio_titulo.id_titulo', '=', 'web_servicio_descripcion.id_titulo')
        ->join('web_servicio', 'web_servicio_titulo.id_servicio', '=', 'web_servicio.id_servicio')
        ->where("web_servicio.id_servicio", $request->txt_id_servicio)
        ->get()->toArray();
      }else{
        $rowData_ = DB::table('web_servicio_titulo')
        ->join('web_servicio_descripcion', 'web_servicio_titulo.id_titulo', '=', 'web_servicio_descripcion.id_titulo')
        ->join('web_servicio', 'web_servicio_titulo.id_servicio', '=', 'web_servicio.id_servicio')
        ->get()->toArray();
      }
     
      return view('admin.servicios.ajax.tablaServicio')->with(compact('rowData_'));
    }

    public function changeServicioTraining(Request $request)
    {
        $variable = DB::table('web_servicio_titulo')->where("id_servicio", $request->txt_id_servicio)->get();
          $html="";
          foreach ($variable as $key => $value) {
          $html.=' <option value="'.$value->id_titulo.'">'.$value->titulo_principal.'</option>';
          }
        return $html;
    }

   
    public function admin_servicio_update(Request $request) 
    {       
        $data =  DB::table('web_servicio_descripcion')->where("id_descripcion", $request->txt_id_descripcion)->update(['info_descripcion' => $request->txt_descripcion_info]); 
        return $data;
    }


    public function listarDataTableInfo(Request $request) {
      
      $rowData_ =  DB::table('web_servicio_descripcion')->where("id_descripcion", $request->txt_id_descripcion)->get(); 
     
      return view('admin.servicios.ajax.tablaServicioInfo')->with(compact('rowData_'));
    }


}