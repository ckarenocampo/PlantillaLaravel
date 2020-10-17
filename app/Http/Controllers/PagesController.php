<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
class PagesController extends Controller
{
   public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
               // echo "Correcto"; die;
                return redirect('/dashboard');
            }else{
                echo "Fallo"; die;
            }
        }     
    	return view('/login_ar');
    }

	public function registro(){
    	return view('/register_ar');
    }
    public function dashboard(){
    	return view('/dashboard');
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