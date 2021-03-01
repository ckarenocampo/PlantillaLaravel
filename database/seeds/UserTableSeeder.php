<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use app\Role;
use app\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name_rol','Administrador')->first();
        $role_user = Role::where('name_rol','Usuario')->first();

        $user = new \App\User();
        $user->name = "Administrador";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('admin');
        $user->rol_id = $role_admin->id;
        $user->save();
        //$user->roles()->attach($role_admin->id);

        $user = new \App\User();
        $user->name = "Usuario";
        $user->email = "user@gmail.com";
        $user->password = Hash::make('user');
        $user->rol_id = $role_user->id;
        $user->save();
       // $user->roles()->attach($role_user->id);

        
    }
}
