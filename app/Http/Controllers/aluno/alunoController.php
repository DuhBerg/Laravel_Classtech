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

      $dados['id'] = Crypt::encrypt($user['id']);


      Mail::to($dados['email'])->send(new Teste($key,$dados));

      // User::find($user['id'])->update($dados);

      return redirect()->route('aluno.index',compact($user,$salas));

    }



<<<<<<< HEAD


=======
>>>>>>> 0d352b05a18bc42c52c100c5ce179869bb280788
    public function confirmarEmail(Request $req)
    {

      $dados = $req->all();
      $email = decrypt($dados['token']);
      $id = decrypt($dados['id']);


      //->whereNull('email')
      $procura_email = User::select('email')
      ->where('id',$id)
      ->get();


      foreach($procura_email as $usuario)
      {
        if($usuario->email == null)
        {
            User::find($id)->update(['email' => $email]);
            echo "Email confirmado com sucesso!";

        }

        elseif($usuario->email != null) {
            echo "Erro! Seu email já foi confirmado";
        }
        else
        {
          echo "Dados Inválidos";
        }

      }









    }

}
