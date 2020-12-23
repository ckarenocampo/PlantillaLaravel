<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function datosInscripcion(){

        $json = json_decode(file_get_contents('https://uso-vistas-proyectos.herokuapp.com/vistas/estudiantes'), true);        ​​​
    }

}
