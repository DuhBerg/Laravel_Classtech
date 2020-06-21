<?php

namespace App\Http\Controllers\sala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Turma;
use Auth;
use App\Sala;
use App\User;

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

      $alunos = array();


        $count = 0;
        foreach ($nAlunos as $aluno) {
          $count = $count + 1;

          array_push($alunos, User::select('*')->where('id',$aluno->idAluno)->first());
        }

      return view('sala.sala_prof')->with(compact('user','turma','count','alunos'));
    }

    public function deletar(Request $req)
    {
      $dados = $req->all();
      $apaga_aluno = Sala::where('idTurma',$dados['id_turma'],['idAluno',$dados['id_aluno']])->delete();


      if($apaga_aluno)
      {
        return redirect()->route('professor.index');
        //aluno excluido com sucesso!

      }
      else {
        return redirect()->route('professor.index');
        //nao foi possível excluir o aluno!
      }


    }


    public function editar(Request $req)
    {
      $dados = $req->all();
      $atualiza_sala = Turma::where('idTurma',$dados['id_turma'])->update(['disciplina' => $dados['nome_turma']]);

      if($atualiza_sala)
      {
        return redirect()->route('professor.index');
        //nome da turma atualizado com sucesso!
      }
      else {
        return redirect()->route('professor.index');
       //nao foi possível atualizar o nome da turma!;
      }


    }



}
