<?php

namespace App\Http\Controllers\sala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Turma;
use Auth;
use App\Sala;

class salaController extends Controller
{
    //

    public function index(Request $req)
    {
      $dados = $req->all();
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));

      $turma = Turma::select('*')->where('idTurma', $dados['idTurma'])->get();

      $nAlunos = Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('salas.idAluno')
      ->where('salas.idTurma', $dados['idTurma'])
      ->get();

        $count = 0;
        foreach ($nAlunos as $aluno) {
          $count = $count + 1;
        }



      return view('sala.sala_prof')->with(compact('user','turma','count','listaAlunos'));

    }
}
