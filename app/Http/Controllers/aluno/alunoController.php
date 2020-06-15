<?php


namespace App\Http\Controllers\aluno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Sala;
use App\Turma;
use App\User;

class alunoController extends Controller
{
    public function index()
    {
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));

      if(!isset($user['email'])){

        return view('aluno.addEmail',compact('user'));
      }
      $salas= Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('turma.*')
      ->where('salas.idAluno', $user['id'])
      ->get();




      return view('aluno.alunoTela',compact('user','salas'));
    }

    public function criarEmail(Request $req){
      $dados = $req->all();
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
      User::find($user['id'])->update($dados);

      $salas= Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('turma.*')
      ->where('salas.idAluno', $user['id'])
      ->get();

      return redirect()->route('aluno.index',compact('user','salas'));


    }

}
