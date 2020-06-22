<?php

namespace App\Http\Controllers\sala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class alunoSalaController extends Controller
{
  public function index(Request $req)
  {
    $dados = $req->all();
    $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));

    $turma = Turma::select('*')->where('idTurma', $dados['idTurma'])->get();

    $nAlunos = Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
    ->select('salas.idAluno')
    ->where('salas.idTurma', $dados['idTurma'])
    ->get();

    $alunos = array();


      $count = 0;
      foreach ($nAlunos as $aluno) {
        $count = $count + 1;

        array_push($alunos, User::select('*')->where('id',$aluno->idAluno)->first());
      }

    return view('sala.sala_aluno')->with(compact('user','turma','count','alunos'));
  }


}
