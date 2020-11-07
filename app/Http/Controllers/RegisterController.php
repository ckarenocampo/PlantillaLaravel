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
    
    public function create()
    {
        return view('register_admin');
    }
  
    public function store(Request $request)
    {
        $role_user = \App\Role::where('name_rol','Usuario')->first();

        $usuarios = new \App\User;
        $usuarios ->name=$request->get('name');
        $usuarios ->email=$request->get('email');
        $usuarios ->password= Hash::make($request->get('password'));
        $usuarios ->rol_id = $role_user->id;
        $usuarios ->save();
        $usuarios->roles()->attach(2);
        return redirect('/')->with('success', 'Informacion guardada exitosamente');
    }
}
