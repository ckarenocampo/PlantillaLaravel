<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('IDInscripcion');
            $table->timestamps();
            $table->string('IDGrupo');
            $table->string('IDExpediente');
            $table->string('IDPensum');
            $table->string('NombreMateria');
            $table->string('NombreDocente');
            $table->string('Ciclo');
            $table->string('Adicionada');
            $table->string('Retirada');
            $table->string('Periodo');
            $table->string('Matricula');
            $table->string('FinalizoCiclo');
            $table->string('Dia');
            $table->string('Turno');
            $table->string('Horario');
            $table->string('Origen');
            $table->string('FechaCreacion');
            $table->string('FechaInscripcion');
            $table->string('Resultado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
