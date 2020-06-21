<?php

namespace App\Http\Controllers\professor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Turma;

class turmaController extends Controller
{
    public function index()
    {
      return view('professor.turma');
    }



    public function criar(Request $req)
    {

    try
    {
      $dados = $req->all();
      $id = auth()->user()->id;
      $idTurma  = $this->randString(6);

      if($dados['disciplina'] == "")
      {
        return back()->with('warning', 'Preencha todos os campos!');
      }

      if(!isset($dados['foto_fundo']))
      return back()->with('warning', 'Seleciona uma foto de fundo!');


            else {



            Turma::create([
                'id' => $idTurma,
                'idProfessor' => $id,
                'disciplina' => $dados['disciplina'],
                'foto_fundo' => $dados['foto_fundo'],
            ]);


          return redirect()->route('professor.index');
              }

      }

        catch(\Illuminate\Database\QueryException $ex)
        {
          return back()->with('warning', 'Preencha todos os campos!');
        }

    }



    public function randString($length){
         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < $length; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
         return $randomString;

     }



}
