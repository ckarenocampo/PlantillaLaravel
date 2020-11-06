<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
 
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['user','admin']);
        //return $request->session()->all();
        $usuarios=\App\User::all();
        return view('usuarios',compact('usuarios'));
    }
    public function usuarios_agregar(){
        return view('/usuarios_agregar');
    }
    public function store(Request $request)
    {
        //AGREGA UN USUARIO DESDE AGREGAR USUARIOS
        $usuarios = new \App\User;
        $usuarios ->name=$request->get('name');
        $usuarios ->email=$request->get('email');
        $usuarios ->password= Hash::make($request->get('password'));
        $usuarios ->save();
        $rol=$request->get('rol');
        $usuarios->roles()->attach($rol);
        return redirect('/usuarios')->with('success', 'Informacion agregada exitosamente');
    }
    public function edit($id)
    {
        $usuarios = \App\User::find($id);
        return view('usuarios_edit',compact('usuarios','id'));
    }
    
    public function update(Request $request, $id)
    {
        $usuarios=$request->except('_token','_method');
        
        $usuarios = \App\User::find($id);
        $usuarios->name=$request->input('name');
        $usuarios->email=$request->input('email');
        $usuarios->password=Hash::make($request->input('password'));
        $usuarios->save();
        return redirect('usuarios')->with('success', 'Informacion actualizada exitosamente');
    }
    public function destroy($id)
    {
        $usuarios = \App\User::find($id);
        $usuarios->delete();
        return redirect('usuarios')->with('success','Informacion borrada exitosamente');
    }
}
