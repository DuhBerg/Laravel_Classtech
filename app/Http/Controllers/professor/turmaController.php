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
      $dados = $req->all();
      $id = auth()->user()->id;
      $idTurma  = $this->randString(6);

      Turma::create([
          'idTurma' => $idTurma,
          'disciplina' => $dados['disciplina'],
          'idProfessor' => $id,
      ]);

    return redirect()->route('professor.turmas.index');
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
