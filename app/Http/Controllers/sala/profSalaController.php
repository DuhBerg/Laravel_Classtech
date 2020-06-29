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
      $apaga_aluno = Sala::where('idTurma',$dados['id_turma'],['idAluno',$dados['id_aluno']])->first()->delete();





      $alunos_aceitos = Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('salas.idAluno')
      ->where('salas.idTurma', $dados['id_turma'])->where('salas.situacao',"aceito")
      ->get();

      $alunos_aceitos_array = array();

      foreach($alunos_aceitos as $aluno)
      {
        array_push($alunos_aceitos_array, User::select('*')->where('id',$aluno->idAluno)->first());
      }



      if($apaga_aluno)
      {
        $deleta['success'] = true;
        $deleta['message'] = "Aluno excluido com sucesso!";
        $deleta['alunos'] = $alunos_aceitos_array;
        echo json_encode($deleta);
        return;
        //aluno excluido com sucesso!

      }
      else {
        $deleta['success'] = false;
        $deleta['message'] = "Não foi possível excluir o aluno!";
        echo json_encode($deleta);
        return;
        //nao foi possível excluir o aluno!
      }


    }




    public function editar(Request $req)
    {
      $dados = $req->all();
      if($dados['nome_turma'] == "")
      {
        $editaSala['success'] = false;
        $editaSala['message'] = "Não foi possível alterar o nome!";
        echo json_encode($editaSala);
        return;
      }
      else
      {
            $atualiza_sala = Turma::where('idTurma',$dados['id_turma'])->update(['disciplina' => $dados['nome_turma']]);


            if($atualiza_sala)
            {
              $editaSala['success'] = true;
              $editaSala['message'] = "Nome alterado com sucesso!";
              $editaSala['nome_turma'] = $dados['nome_turma'];
              echo json_encode($editaSala);
              return;
              //nome da turma atualizado com sucesso!
            }
            else {
              $editaSala['success'] = false;
              $editaSala['message'] = "Não foi possível alterar o nome!";
              echo json_encode($editaSala);
              return;
             //nao foi possível atualizar o nome da turma!;
            }
          }


    }



    public function aceitarAlunos(Request $req)
    {




      $dados = $req->all();
      $aceita_aluno = Sala::where('idTurma',$dados['idTurma'])->where('idAluno',$dados['idAluno'])->update(['situacao' => "aceito"]);

      $alunos_pendentes = Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('salas.idAluno')
      ->where('salas.idTurma', $dados['idTurma'])->where('salas.situacao',"pendente")
      ->get();

      $alunos_pendentes_array = array();
      $count_pendentes = 0;

      foreach ($alunos_pendentes as $aluno_pendente) {
        $count_pendentes = $count_pendentes + 1;

        array_push($alunos_pendentes_array, User::select('*')->where('id',$aluno_pendente->idAluno)->first());
      }




      if($aceita_aluno)
      {
        $aceita['success'] = true;
        $aceita['message'] = 'Aluno aceito com sucesso!';
        $aceita['alunos_notificacao'] = $count_pendentes;
        echo json_encode($aceita);
        return;
      }
      else {
        $aceita['success'] = false;
        $aceita['message'] = 'Erro nao foi possivel aceitar esse aluno!';
        echo json_encode($aceita);
        return;
      }


    }




    public function recusarAlunos(Request $req)
    {
      $dados = $req->all();

      $atualiza_solicitacao = Sala::where('idTurma',$dados['idTurma'])
                                  ->where('idAluno',$dados['idAluno'])
                                  ->delete();


      $alunos_pendentes = Sala::join('turma', 'salas.idTurma', '=', 'turma.idTurma')
      ->select('salas.idAluno')
      ->where('salas.idTurma', $dados['idTurma'])->where('salas.situacao',"pendente")
      ->get();

      $alunos_pendentes_array = array();
      $count_pendentes = 0;

      foreach ($alunos_pendentes as $aluno_pendente) {
        $count_pendentes = $count_pendentes + 1;

        array_push($alunos_pendentes_array, User::select('*')->where('id',$aluno_pendente->idAluno)->first());
      }





      if($atualiza_solicitacao)
      {
      $recusa['success'] = true;
      $recusa['message'] = 'Aluno recusado com sucesso!';
      $recusa['alunos_notificacao'] = $count_pendentes;
      echo json_encode($recusa);
      return;
      //Aluno recusado com sucesso!
      }
      else {
      $recusa['success'] = false;
      $recusa['message'] = 'Não foi possível recusar esse aluno!';
      echo json_encode($recusa);
      return;
      //Erro nao foi possivel recusar esse aluno!
      }
    }





    public function redirect_sala($idTurma)
    {

      $request = new \Illuminate\Http\Request();
      $request->setMethod('POST');
      $request->request->add(['idTurma' => $idTurma]);

  //    return redirect()->action("sala\profSalaController@index", ['idTurma' => $request]);
    //  return redirect()->route('professor.sala.index');

      return $this->index($request); //funciona mas url fica zuado
    }







}
