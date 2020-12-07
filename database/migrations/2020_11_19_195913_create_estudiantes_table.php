<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('IDExpediente');
            $table->string('CodigoEstudiante');
            $table->string('PrimerNombre');
            $table->string('SegundoNombre');
            $table->string('PrimerApellido');
            $table->string('SegundoApellido');
            $table->string('Genero');
            $table->string('idCarrera');
            $table->string('EstadoCivil');
            $table->string('PlanVersion');
            $table->string('FechaIngreso');
            $table->string('Cum');
            $table->string('FechaNacimiento');
            $table->string('FechaCreacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
