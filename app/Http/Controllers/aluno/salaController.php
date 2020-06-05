<?php

namespace App\Http\Controllers\aluno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sala;

class salaController extends Controller
{
    public function index()
    {
      return view('aluno.adicionarSala');
    }

    public function criar(Request $req)
    {
      $dados = $req->all();
      $id = auth()->user()->id;

      Sala::create([
        'idTurma' => $dados['codigo'],
        'idAluno' => $id,
      ]);

        return redirect()->route('aluno.sala.index');


    }

}
