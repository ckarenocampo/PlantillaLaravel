<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function index(Request $request)
    {
        $usuarios=\App\User::all();
        return view('/usuarios', compact('usuarios'));

    }
    public function data()
    {
        $users = DB::table('users') ->select('id','name','email')->get();
        return json_encode($users);

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
        $contra = $usuarios->password=$request->get('password');

        $correo = \App\User::where('email',$emailre)->first();
        $tam =  strlen($correo);

        if($tam > 1){
            return redirect('/usuarios_agregar')->with('flash_message_error','Error El correo ya fue registrado');
        }else{
            if(strlen($contra) < 6 ){
                return redirect('/usuarios_agregar')->with('flash_message_error','La contraseña debe tener almenos 6 caracteres');
            }else{
                $usuarios ->name=$request->get('name');
                $usuarios ->email=$request->get('email');
                $usuarios ->password= Hash::make($request->get('password'));
                $usuarios ->rol_id = $request->get('rol_id');
                $usuarios ->save();
                return redirect('/usuarios')->with('success', 'Informacion agregada exitosamente');
            }
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


        $emailre = $request->get('email');

        $correo = \App\User::where('email',$emailre)->first();

        
        $correoconid = \App\User::where('id',$id)->first();

        $tam =  strlen($correo);

        $url = '/usuarios/'. $id .'/edit'; 

        if($tam<1){
            return    $this->actualizar($usuarios,$request,$id,$url); //Uno nuevo
        }else{
            if($correoconid['email'] == $correo['email']){
                return $this->actualizar($usuarios,$request,$id,$url); // El mismo correo
            }else{
                return redirect($url)->with('message_error','El correo ingresado ya existe');
            }
        }
    }

    public function actualizar($usuarios, $request, $id, $url)
    {
      
       
        if($request->get('password')==null){
          
           $usuarios = \App\User::find($id);
            $usuarios->name=$request->input('name');
            $usuarios->email=$request->input('email');
            $usuarios->password=$request->user()->password;
            $usuarios ->rol_id = $request->get('rol_id');
            $usuarios->save();
           
            return redirect('/usuarios')->with('success', 'Informacion actualizada exitosamente');
        }else{
            $passSession = $request->user()->password;
            //$passActual = $request->input('password-actual');

            //if(Hash::check($passActual, $passSession)){
               $usuarios = \App\User::find($id); 
               $usuarios->name=$request->input('name');
                $usuarios->email=$request->input('email');
                $usuarios->password=Hash::make($request->get('password'));
                $usuarios ->rol_id = $request->get('rol_id');

                $usuarios->save();
                return redirect('/usuarios')->with('success', 'Informacion actualizada exitosamente');
           // }else{
           //     return redirect($url)->with('message_error', 'La contraseña actual no es correcta');
            //}
        }
    
    } 

    public function destroy($id)
    {
        $usuarios = \App\User::find($id);
        $usuarios->delete();
        return redirect('usuarios')->with('success','Informacion borrada exitosamente');
    }
}
