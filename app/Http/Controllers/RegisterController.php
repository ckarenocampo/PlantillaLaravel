<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('register_admin');
    }
  
    public function store(Request $request)
    {
        $role_user = \App\Role::where('name_rol','Usuario')->first();
        $usuarios = new \App\User;
        $emailre = $usuarios->email=$request->get('email');
        $correo = \App\User::where('email',$emailre)->first();
        $tam =  strlen($correo);
        if($tam > 1){
            return redirect('/register_admin')->with('flash_message_error','ERROR El correo ya fue registrado');
        }else{ 
            $usuarios ->name=$request->get('name');
            $usuarios ->email=$request->get('email');
            $usuarios ->password= Hash::make($request->get('password'));
            $usuarios ->rol_id = $role_user->id;
            $usuarios ->save();
            $usuarios->roles()->attach(2);
            return redirect('/register_admin')->with('success', 'Registro realizado exitosamente');
        }
    }
}
