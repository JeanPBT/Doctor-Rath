<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Storage;
use Image;
use Illuminate\Contracts\Filesystem\Filesystem;
use File;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
 
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function web_registe_user(Request $request)
    {
        DB::beginTransaction();

        try {

            $user =  User::create([
            'name'                        => $request->txt_nombre,//Nombre
            'email'                       => $request->txt_email,
            'password'                    => Hash::make($request->txt_password),
            'password_new'                => $request->txt_password,
            'telefono_movil'              => $request->txt_telefono_movil,

            'admin'                       => 2,
            'tipo_user'                   => 2,
            'terminos'                    => $request->txt_terminos_condiciciones,

        ]);

        Auth::login($user);

        DB::commit();
        // all good
        return json_encode(['data' => 'Procesado el registro correctamente!','state' => 'ok']);
        } catch (\Exception $e) {
            DB::rollback();
            return json_encode(['data' =>$e->getMessage(),'state' => 'error']);
        }

    }

}
