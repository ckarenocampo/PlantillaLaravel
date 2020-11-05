<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use Auth;
use Session;

class PagesController extends Controller
{
   public function login_admin(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                //echo "Correcto"; die;
                //Session::put('adminSession',$data['email']);
               return redirect('/admin');
            }else{
                return redirect('/')->with('flash_message_error','Correo o contraseña inválido');
            }
        }     
    	return view('/login_admin');
    }
    public function admin(){
        /*if(Session::has('adminSession')){
            
        }else{
            return redirect('/')->with('flash_message_error', 'Por favor inicie sesión');
        }*/
    	return view('/admin');
    }
    public function index()
    {
        return view('formulario');
    }
    public function store(Request $request)
    {
        $usuarios = new \App\User;
        $usuarios ->name=$request->get('name');
        $usuarios ->email=$request->get('email');
        $usuarios ->password= Hash::make($request->get('password'));
        $usuarios ->save();
        return redirect('/usuarios')->with('success', 'Information has been added');
    }
    public function formulario(){
        return view('/formulario');
    }
	public function registro(){
    	return view('/register_admin');
    }
    public function profile(){
    	return view('/profile');
    }
	public function tables(){
    	return view('/tables');
    }
    public function icons(){
        return view('/icons');
    }
    public function logout(){
        Session::flush();
        return redirect('/')->with('flash_message_success','Cerró sesión exitosamente');
    }
}