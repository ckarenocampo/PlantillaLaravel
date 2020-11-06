<?php

use Illuminate\Database\Seeder;
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
        $role_admin = Role::where('name_rol','admin')->first();
        $role_user = Role::where('name_rol','user')->first();

        $user = new \App\User();
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('admin');
        $user->save();
        
        $user->roles()->attach($role_admin);

        $user = new \App\User();
        $user->name = "User";
        $user->email = "user@gmail.com";
        $user->password = Hash::make('user');
        $user->save();
        $user->roles()->attach($role_user);

        
    }
}
