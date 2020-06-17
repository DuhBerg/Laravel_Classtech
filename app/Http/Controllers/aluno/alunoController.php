<?php


namespace App\Http\Controllers\aluno;

use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Sala;
use App\Turma;
use App\User;
use App\Mail\Teste;
use Illuminate\Support\Facades\Mail;

class alunoController extends Controller
{
    public function index()
    {
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
      $salas= Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('turma.*')
      ->where('salas.idAluno', $user['id'])
      ->get();


        if(!isset($user['email']) || $user['email'] == ""){
          return view('aluno.addEmail',compact('user'));
        }

        else
        {

          return view('aluno.alunoTela',compact('user','salas'));
        }
    }




    public function criarEmail(Request $req){
      $dados = $req->all();
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
      $salas= Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('turma.*')
      ->where('salas.idAluno', $user['id'])
      ->get();


      $key = Crypt::encrypt($dados['email']);

      //dd($key);

      $fodase = decrypt($key);

      dd($fodase);




      Mail::to($dados['email'])->send(new Teste($key,$dados));

      // User::find($user['id'])->update($dados);

      return redirect()->route('aluno.index',compact($user,$salas));


    }

}
