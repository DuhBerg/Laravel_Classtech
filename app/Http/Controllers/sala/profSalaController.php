<?php




namespace App\Http\Controllers\sala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Turma;
use Auth;
use App\Sala;
use App\User;

class profSalaController extends Controller
{
    //

    public function index(Request $req)
    {
      $dados = $req->all();
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));

      $turma = Turma::select('*')->where('idTurma', $dados['idTurma'])->get();

      $alunos_aceitos = Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('salas.idAluno')
      ->where('salas.idTurma', $dados['idTurma'])->where('salas.situacao',"aceito")
      ->get();


      $alunos_pendentes = Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('salas.idAluno')
      ->where('salas.idTurma', $dados['idTurma'])->where('salas.situacao',"pendente")
      ->get();


      $alunos_aceitos_array = array();
      $alunos_pendentes_array = array();



        $count_aceitos = 0;
        $count_pendentes = 0;
        foreach ($alunos_aceitos as $aluno_aceito) {
          $count_aceitos = $count_aceitos + 1;

          array_push($alunos_aceitos_array, User::select('*')->where('id',$aluno_aceito->idAluno)->first());
        }


        foreach ($alunos_pendentes as $aluno_pendente) {
          $count_pendentes = $count_pendentes + 1;

          array_push($alunos_pendentes_array, User::select('*')->where('id',$aluno_pendente->idAluno)->first());
        }


      return view('sala.sala_prof')->with(compact('user','turma','count_aceitos','count_pendentes','alunos_aceitos_array','alunos_pendentes_array'));
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
        return redirect()->route('professor.index')->with('success', 'Nome alterado com sucesso!');
        //nome da turma atualizado com sucesso!
      }

      else {
        return redirect()->route('professor.index')->with('warning', 'Por favor, insira um nome para turma!');
       //nao foi possível atualizar o nome da turma!;
      }


    }



    public function aceitarAlunos(Request $req)
    {

      $dados = $req->all();
      $aceita_aluno = Sala::where('idTurma',$dados['id_turma'])
                          ->where('idAluno',$dados['id_aluno'])
                          ->update(['situacao' => "aceito"]);

      if($aceita_aluno)
      {
        return redirect()->route('professor.index');
        //Aluno aceito com sucesso!
      }
      else {
        return redirect()->route('professor.index');
        //Erro nao foi possivel aceitar esse aluno!
      }


    }




    public function recusarAlunos(Request $req)
    {
      $dados = $req->all();

      $atualiza_solicitacao = Sala::where('idTurma',$dados['id_turma'])
                                  ->where('idAluno',$dados['id_aluno'])
                                  ->delete();

      if($atualiza_solicitacao)
      {
      return redirect()->route('professor.index');
      //Aluno recusado com sucesso!
      }
      else {
      return redirect()->route('professor.index');
      //Erro nao foi possivel recusar esse aluno!
      }
    }





}
