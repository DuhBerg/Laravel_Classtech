<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $fillable = ['idTurma','titulo','caminhoArquivo','start','end'];
    protected $primaryKey = 'idTurma';
    protected $table = "atividades";

}
