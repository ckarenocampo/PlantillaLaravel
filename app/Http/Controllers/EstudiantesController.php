<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{

    public function index(Request $request)
    {
        //$estudiantes = DB::table('estudiantes') ->select('IDExpediente','CodigoEstudiante','PrimerNombre','SegundoNombre',
        //'Genero','idCarrera','EstadoCivil','PlanVersion','FechaIngreso','Cum','FechaNacimiento','FechaCreacion')->get();
        //$estudiantes = json_encode($estudiantes);
        return view('/estudiantes');
    }
    public function dataEstudiante()
    {
        /*$estudiantes = DB::table('estudiantes') ->select('IDExpediente','CodigoEstudiante','PrimerNombre','SegundoNombre',
        'Genero','idCarrera','EstadoCivil','PlanVersion','FechaIngreso','Cum','FechaNacimiento','FechaCreacion')->get();
            return json_encode($estudiantes);
        */


    }
    public function dataInscripcion()
    {/*
        $inscripciones = DB::table('inscripciones') ->select('IDInscripcion','IDGrupo','IDExpediente','IDPensum',
        'NombreMateria','NombreDocente','Ciclo','Adicionada','Retirada','Periodo','Matricula','FinalizoCiclo','Dia',
        'Turno','Horario','Origen','FechaCreacion','FechaInscripcion','Resultado')->get();
            return json_encode($inscripciones);
*/
    }

}
