<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
class PagesController extends Controller
{
   public function login_admin(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
               // echo "Correcto"; die;
                return redirect('/admin');
            }else{
                echo "Fallo"; die;
            }
        }     
    	return view('/login_admin');
    }

	public function registro(){
    	return view('/register_admin');
    }
    public function admin(){
    	return view('/admin');
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
    public function formulario(){
        return view('/formulario');
    }
    public function welcome(){
        return view('/welcome');
    }
}