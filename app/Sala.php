<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
  protected $fillable = [
      'idTurma', 'idAluno', 'situacao',
  ];

  protected $table = "salas";
  protected $primaryKey = 'idAluno';

}
