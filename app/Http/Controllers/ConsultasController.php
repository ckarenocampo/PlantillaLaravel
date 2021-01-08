<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    //

    public function datosInscripcion(){
        $inscripcion = file_get_contents("https://uso-vistas-proyectos.herokuapp.com/vistas/inscripciones");
        $arrayInscripcion = json_decode($inscripcion,true);
        return $arrayInscripcion;
    }
    public function datosEstudiantes(){
        $estudiantes = file_get_contents("https://uso-vistas-proyectos.herokuapp.com/vistas/estudiantes");
        $arrayEstudiantes = json_decode($estudiantes,true);
        return $arrayEstudiantes;
    }

    public function estudiantesInscritos(){
        $inscripcion = file_get_contents("https://uso-vistas-proyectos.herokuapp.com/vistas/inscripciones");
        $arrayInscripcion = json_decode($inscripcion,true);

        $estudiantes = file_get_contents("https://uso-vistas-proyectos.herokuapp.com/vistas/estudiantes");
        $arrayEstudiantes = json_decode($estudiantes,true);

        $arrayEstudiantesInscritos = array();

        foreach($arrayInscripcion['datos'] as $inscri){
            foreach($arrayEstudiantes['datos'] as $estud){
                if($inscri['IDExpediente'] == $estud['IDExpediente']){
                    array_push($arrayEstudiantesInscritos, array_merge($inscri,$estud));
                }
            }

        }
        return $arrayEstudiantesInscritos;
    }

}
