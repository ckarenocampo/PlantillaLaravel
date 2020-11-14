<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
 
    public function index(Request $request)
    {
        //return $request->session()->all();
        $usuarios=\App\User::all();
        return view('usuarios',compact('usuarios'));
    }
    public function usuarios_agregar(){
        $roles = \App\Role::all();
        return view('/usuarios_agregar', compact('roles'));
    }
    public function store(Request $request)
    {
        //AGREGA UN USUARIO DESDE AGREGAR USUARIOS
        $usuarios = new \App\User;
        $emailre = $usuarios->email=$request->get('email');
        $correo = \App\User::where('email',$emailre)->first();
        $tam =  strlen($correo);
        //echo $tam;
        //echo $correo;
        if($tam > 1){
            return redirect('/usuarios_agregar')->with('flash_message_error','ERROR El correo ya fue registrado');
        }else{ 
            $usuarios ->name=$request->get('name');
            $usuarios ->email=$request->get('email');
            $usuarios ->password= Hash::make($request->get('password'));
            $usuarios ->rol_id = $request->get('rol_id');
            $usuarios ->save();
            $rol = $usuarios ->rol_id;
            $usuarios->roles()->attach($rol);
            return redirect('/usuarios')->with('success', 'Informacion agregada exitosamente');
        }
    }
    public function edit($id)
    {
        $usuarios = \App\User::find($id);
        $roles = \App\Role::all();

        return view('usuarios_edit',compact('usuarios','id','roles'));
    }
    
    public function update(Request $request, $id)
    {
        $usuarios=$request->except('_token','_method');
        
        $usuarios = \App\User::find($id);
        $usuarios->name=$request->input('name');
        $usuarios->email=$request->input('email');
        $usuarios->password=Hash::make($request->input('password'));
        $usuarios ->rol_id = $request->get('rol_id');
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
