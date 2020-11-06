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
            Session::regenerate();
                        
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                Session::put('name',$request->user()->name);
                Session::put('email',$request->user()->email);
 
               if($request->user()->authorizeRoles('admin')){
                    Session::put('rol','admin');
                    return redirect('/admin');
                  
               }else{
                    if($request->user()->authorizeRoles('user')){
                        Session::put('rol','user');
                        return redirect('/admin');
                    }
               }
            }else{
                return redirect('/')->with('flash_message_error','Correo o contraseña inválido');
            }
        }     
    	return view('/login_admin');
    }
    public function admin(Request $request){
    	return view('/admin');
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('flash_message_success','Cerró sesión exitosamente');
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
    
}