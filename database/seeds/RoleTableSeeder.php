<?php

use Illuminate\Database\Seeder;
use app\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role();
        $role->name_rol= "Administrador";
        $role->save();

        $role = new \App\Role();
        $role->name_rol= "Usuario";
        $role->save();
        
    }
}
