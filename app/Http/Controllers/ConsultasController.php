<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultasController extends Controller
{
   //
   public $prueba = 0;

    public function datosEstudiantes(){
        $estudiantes = file_get_contents("https://uso-vistas-proyectos.herokuapp.com/vistas/estudiantes");
        $arrayEstudiantes = json_decode($estudiantes,true);
        return $arrayEstudiantes;
    }

    public function datosInscripcion(){
        $inscripcion = file_get_contents("https://uso-vistas-proyectos.herokuapp.com/vistas/inscripciones");
        $arrayInscripcion = json_decode($inscripcion,true);
        return $arrayInscripcion;
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
    
    public static function porcentajes($pos){
        $total=0;
        $vistas = array(
            '0' => (int)file_get_contents("views_admin.txt"),
            '1' => (int)file_get_contents("views_perfil.txt"),
            '2' => (int)file_get_contents("views_usuarios.txt"),
            '3' => (int)file_get_contents("views_estudiantes.txt"),
            '4' => (int)file_get_contents("views_inscripciones.txt"),
            '5' => (int)file_get_contents("views_aprobadosporciclo.txt"),
            '6' => (int)file_get_contents("views_inscripcionesporciclo.txt"),
            '7' => (int)file_get_contents("views_retirospormateria.txt")
        );
        foreach($vistas as $v){
            $total = $total + $v;
        }
        $total + 1;

       $porcentajes = array(
           '0' =>  $vistas[0] * 100 / $total,
           '1' =>  $vistas[1] * 100 / $total, 
           '2' =>  $vistas[2] * 100 / $total, 
           '3' =>  $vistas[2] * 100 / $total, 
           '4' =>  $vistas[2] * 100 / $total, 
           '5' =>  $vistas[2] * 100 / $total, 
           '6' =>  $vistas[2] * 100 / $total, 
           '7' =>  $vistas[2] * 100 / $total
        );

        return number_format($porcentajes[$pos], 2 ) ;
    }

    public function Totales(){
        
        $arrayEstudiantes = $this->datosEstudiantes();
        $arrayEstudiantesInscritos = $this->estudiantesInscritos();


         ///total inscritos
        function unique_multidim_array($array, $key) {
            $temp_array = array();
            $i = 0;
            $key_array = array();
           
            foreach($array as $val) {
                if (!in_array($val[$key], $key_array)) {
                    $key_array[$i] = $val[$key];
                    $temp_array[$i] = $val;
                }
                $i++;
            }
            return $temp_array;
        }
        $resultInscritos = unique_multidim_array($arrayEstudiantesInscritos,'PrimerNombre');
        $numInscritos = count($resultInscritos);
        

        ///total retiros
        $res= 0;
        foreach( $arrayEstudiantesInscritos as $val){
            if($val['Ciclo'] == '02/04'){
                $suma = (int)$val['Grupo'];
                $res = $res + $suma;
            }  
        }

        ///Total estudiantes
        $arrayTotalEstudiantes = array();
        foreach($arrayEstudiantes['datos'] as $estud){
            array_push($arrayTotalEstudiantes, $estud);
        }
        $totalEstudiantes = count($arrayTotalEstudiantes);

         ///Total mas y fem
        $fem = 0;
        $mas = 0;
        foreach( $arrayTotalEstudiantes as $val){
            if($val['Genero']=='Femenino'){
               $fem = $fem +1;
            } else{
                $mas = $mas +1;
            } 
        }

        $array = array(
            "inscritos" => $numInscritos,
            "estudiantes" => $totalEstudiantes,
            "retirada" => $res,
            "femenino" => $fem,
            "masculino" => $mas
        );

        return view('/admin')->with('cont', $array);
    }

   
}
