<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
  protected $fillable = [
      'idTurma', 'disciplina', 'idProfessor','foto_fundo',
  ];


  protected $table = "turma";
}
