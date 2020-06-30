<?php
namespace App\Http\Controllers\sala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Turma;
use Auth;
use App\Sala;
use App\User;
use App\Atividade;

class profSalaController extends Controller
{

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
        return $this->redirect_sala($dados['id_turma']);
        //aluno excluido com sucesso!

      }
      else {
        return $this->redirect_sala($dados['id_turma']);
        //nao foi possível excluir o aluno!
      }


    }

    public function editar(Request $req)
    {
      $dados = $req->all();
      if($dados['nome_turma'] == "")
      {
        return $this->redirect_sala($dados['id_turma'])->with('warning', 'Por favor, insira um nome para turma!');
      }
      else
      {
            $atualiza_sala = Turma::where('idTurma',$dados['id_turma'])->update(['disciplina' => $dados['nome_turma']]);


            if($atualiza_sala)
            {
              return $this->redirect_sala($dados['id_turma'])->with('success', 'Nome alterado com sucesso!');
              //nome da turma atualizado com sucesso!
            }
            else {
              return $this->redirect_sala($dados['id_turma'])->with('warning', 'Por favor, insira um nome para turma!');
             //nao foi possível atualizar o nome da turma!;
            }
          }


    }
    public function aceitarAlunos(Request $req)
    {
      $dados = $req->all();
      $aceita_aluno = Sala::where('idTurma',$dados['idTurma'])
                          ->where('idAluno',$dados['idAluno'])
                          ->update(['situacao' => "aceito"]);

      if($aceita_aluno)
      {
        // return $this->redirect_sala($dados['id_turma']);
        $aceita['success'] = true;
        $aceita['message'] = 'Aluno aceito com sucesso!';
        echo json_encode($aceita);
        return;
        //Aluno aceito com sucesso!
      }
      else {
        //return $this->redirect_sala($dados['id_turma']);
        $aceita['success'] = false;
        $aceita['message'] = 'Erro nao foi possivel aceitar esse aluno!';
        echo json_encode($aceita);
        return;
        //Erro nao foi possivel aceitar esse aluno!
      }


    }


    public function recusarAlunos(Request $req)
    {
      $dados = $req->all();

      $atualiza_solicitacao = Sala::where('idTurma',$dados['idTurma'])
                                  ->where('idAluno',$dados['idAluno'])
                                  ->delete();

      if($atualiza_solicitacao)
      {
      $recusa['success'] = true;
      $recusa['message'] = 'Aluno recusado com sucesso!';
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


    public function adicionarAtividade(Request $req){
      try{
       $dados = $req->all();
       Atividade::create([
       'idTurma' => $dados['idTurma'],
       'titulo' => $dados['Titulo'],
       'start' => $dados['txtDt'],
       'end' => $dados['txtDtFinal'],
     ]);
     return redirect()->route('professor.index');
      }catch(\Illuminate\Database\QueryException $ex){

        return back()->with('warning', 'Preencha todos os campos!');
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
