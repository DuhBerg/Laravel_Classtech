<?php


namespace App\Http\Controllers\aluno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Sala;
use App\Turma;

class alunoController extends Controller
{
    public function index()
    {
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
      if($user['email'] == ''){

        return redirect()->route('aluno.addEmail');
      }
      $salas= Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('turma.*')
      ->where('salas.idAluno', $user['id'])
      ->get();




      return view('aluno.alunoTela',compact('user','salas'));
    }

    public function criarEmail(Request $req){
      dd($req);
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
      return view('aluno.alunoTela',compact('user','salas'));
    }

}
