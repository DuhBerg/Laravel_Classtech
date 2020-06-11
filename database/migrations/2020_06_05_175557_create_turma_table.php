<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma', function (Blueprint $table) {
            $table->string('idTurma', 6)->primary();
            $table->string('idProfessor');
            $table->string('disciplina');
            $table->string('foto_fundo');
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
        Schema::dropIfExists('turma');
    }
}
