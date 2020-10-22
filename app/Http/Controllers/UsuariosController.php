<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function create()
    {
        return view('register_admin');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    public function store(Request $request)
    {
    
        $usuarios = new \App\User;
        $usuarios ->name=$request->get('name');
        $usuarios ->email=$request->get('email');
        $usuarios ->password= Hash::make($request->get('password'));
        $usuarios ->save();
       
        //return redirect('usuarios')->with('success', 'Information has been added');
        return redirect('/')->with('success', 'Information has been added');

    }
    
    public function index()
    {
        $usuarios=\App\User::all();
        return view('usuarios',compact('usuarios'));
    }
    public function edit($id)
    {
        $usuarios = \App\User::find($id);
        // falta funcion editar
        return view('edit',compact('usuarios','id'));
    }
    public function update(Request $request, $id)
    {
        $usuarios=$request->except('_token','_method');
        
        $usuarios = \App\User::find($id);
        $usuarios->name=$request->input('name');
        $usuarios->email=$request->input('email');
        $usuarios->password=Hash::make($request->input('password'));
        $usuarios->save();
        return redirect('usuarios');
    }
    public function destroy($id)
    {
        $usuarios = \App\User::find($id);
        $usuarios->delete();
        return redirect('usuarios')->with('success','Information has been  deleted');
    }
}
