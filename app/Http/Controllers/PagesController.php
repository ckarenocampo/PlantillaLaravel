<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

use Auth;
use Session;

class PagesController extends Controller
{
   public function login_admin(Request $request){

        if($request->isMethod('post')){
            Session::regenerate();
            $data = $request->input();

            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                Session::put('name',$request->user()->name);
                Session::put('email',$request->user()->email);
                Session::put('rol',$request->user()->rol_id);

                if(session('rol')==1){
                    return redirect('/admin');
                }else{
                    if(session('rol')==2){
                        return redirect('/admin');
                    }
               }
            }else{
                return redirect('/')->with('flash_message_error','Correo o contraseña inválido');
            }
        }
    	return view('/login_admin');
    }
    public function logout(){
        Session::flush();
        return redirect('/')->with('flash_message_success','Cerró sesión exitosamente');
    }
    public function admin(Request $request){
    	return view('/admin');
    }
    public function perfil(Request $request)
    {
        $id = $request->user()->id;
        $usuarios = \App\User::find(strval($id));

        if($request->isMethod('post')){
            $id = $request->user()->id;
            $usuarios = \App\User::find(strval($id));

            $passSession = $request->user()->password;
            $passActual = $request->input('password-actual');

            if(Hash::check($passActual, $passSession)){
                    $usuarios ->password = Hash::make($request->get('password'));
                    $usuarios ->save();
                    return redirect('/perfil')->with('message_success', 'Contraseña actualizada exitosamente');

            }else{
                return redirect('/perfil')->with('message_error', 'La contraseña actual no es correcta');

            }
        }

        return view('/perfil',compact('usuarios'));

    }
    public function inscripciones(Request $request){
        return view('/inscripciones');
    }
    public function inscripcionesporestudiante(Request $request){
        return view('/estudiantes_inscritos');
    }
}
