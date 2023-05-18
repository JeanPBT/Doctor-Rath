<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;
use File;
use DataTables;

class NoticiaController extends Controller {

    //:::::::::::::::::::::::::: CRUD ::::::::::::::::::::::::::
    public function admin_noticia() {
      return view('admin.pages.noticia.admin_noticia');
    }
   
    public function admin_noticia_listar(Request $request) {
      $rowData_ = DB::select("
      SELECT 
      `id`, 
      `url_image`, 
      nombre,  
      descripcion
      FROM web_noticia
      ORDER BY id desc");

      $dataArra = [];
       
      foreach ($rowData_ as $key => $value) {
        array_push($dataArra,[
          "id"=>$rowData_[$key]->id,  
          "url_image"=>$rowData_[$key]->url_image,
          "nombre"=>$rowData_[$key]->nombre,
          "descripcion"=>mb_strimwidth(strip_tags(stripslashes($rowData_[$key]->descripcion)), 0, 210, "...") ,
        ]);
      }
      return Datatables::of($dataArra)->make(true);
    }

    public function admin_noticia_crear(Request $request) 
    {        

              $file0           = $request->file('image0');
              $txt_pro_name    = $request->txt_pro_name;
              $txt_descripcion = $request->txt_descripcion;
              $id_imagen_0       = $request->id_producto;

            switch($request->isValues) {
              case 'CREAR': 

                DB::beginTransaction();

                try {

                  if($file0 != NULL){

                      $filename  =  time() .'_'.$file0->getClientOriginalName();
                      $path = "img/web_noticia";
                      $file0->move($path,$filename);

                  
                      DB::table('web_noticia')->insert([
                        'nombre'          => $txt_pro_name, 
                        'descripcion'     => $txt_descripcion, 
                        'url_image'       => '/img/web_noticia/'.$filename, 
                        'created_at'      => date("Y-m-d H:i:s"),
                        'updated_at'      =>date("Y-m-d H:i:s")
                      ]);
                    }else{
                      DB::table('web_noticia')->insert([
                        'nombre'          => $txt_pro_name, 
                        'descripcion'     => $txt_descripcion, 
                        'created_at'      => date("Y-m-d H:i:s"),
                        'updated_at'      =>date("Y-m-d H:i:s")
                      ]);
                    }
                    
                    DB::commit();
                    // all good
                    return json_encode(['data' => 'Registro correctamente!','state' => 'ok']);
                } catch (\Exception $e) {
                    DB::rollback();
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }

                    break;
              case 'ACTUALIZAR': 


                DB::beginTransaction();

                try {

                    if($file0 != NULL){
                      $url_imagen =  DB::table('web_noticia')->where('id', '=', $id_imagen_0)->get();
                    
                        if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                          unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                        }
                      
                        $filename  =  time() .'_'.$file0->getClientOriginalName(); 
                        $path = "img/web_noticia";
                        $file0->move($path,$filename); 
          
                        DB::table('web_noticia')
                          ->where("id",$id_imagen_0)
                          ->update([
                            'url_image' => '/img/web_noticia/'.$filename, 
                            'updated_at' =>date("Y-m-d H:i:s")
                          ]); 

                      }else{

                        DB::table('web_noticia')
                        ->where("id",$id_imagen_0)
                        ->update([
                          'nombre'         => $txt_pro_name, 
                          'descripcion'    => $txt_descripcion, 
                          'updated_at' =>date("Y-m-d H:i:s")
                        ]); 

                      }

                      DB::commit();
                      // all good
                      return json_encode(['data' => 'Actualizado correctamente!','state' => 'ok']);
                  } catch (\Exception $e) {
                      DB::rollback();
                      // something went wrong
                      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                  }


                      break;

                case 'ELIMINAR': 
        
                  DB::beginTransaction();

                  try {
                    $url_imagen =  DB::table('web_noticia')->where('id', '=', $id_imagen_0)->get();
                    
                    if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                    }

                      DB::table('web_noticia')->where('id', '=', $id_imagen_0)->delete();
          
                      DB::commit();
                      // all good
                      return json_encode(['data' => 'Elimino el registro correctamente!','state' => 'ok']);
                  } catch (\Exception $e) {
                      DB::rollback();
                      // something went wrong
                      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                  }

                      break;
          }
    }

    public function admin_noticia_editar(Request $request) {
     
      $rowData_ = DB::select("
      SELECT 
      `id`, `url_image`,  nombre as  name_color,  descripcion as  description
      FROM web_noticia
      WHERE id=?
      ORDER BY id desc ", [$request->id_producto]);

      return json_encode($rowData_) ;
    }

    public function admin_noticia_img_upload(Request $request) {
     // https://stackoverflow.com/questions/42462029/tinymce-image-upload-with-laravel-without-file-manager
      $fileFormat = $request->file('file')->getClientOriginalExtension();

      $PhotoValidFormat = array('jpg', 'png', 'gif', 'jpeg', 'bmp');


    if (in_array(strtolower($fileFormat), $PhotoValidFormat) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

        $PhotoName = uniqid() . '.' . $request->file('file')->getClientOriginalExtension();

        $fileSize = number_format($_FILES['file']['size'] / 1048576, 2);//to mb


        if ($fileSize <= 50) {


            if ($request->file('file')->move('img/mc_web_noticia_tinymce', $PhotoName)) {

               return json_encode(array(

                   'location'=>'/posts/images/'.$PhotoName

               ));


            } else
                $res = -1;

        } //bad format or size not allowed for php.ini
        else {
            if (isset($_FILES['file']['error']) && $_FILES['file']['error'] == 1)
                $res = -1;
            else
                $res = 0;
        }

        echo json_encode(array('res' => $res));

    }


    }

}