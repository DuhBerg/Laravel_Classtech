<?php

namespace App\Http\Controllers\sala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Turma;
use Auth;

class salaController extends Controller
{
    //

    public function index(Request $req)
    {
      $dados = $req->all();
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
      $turma= Turma::select('*')
      ->where('idTurma', $dados['idTurma'])
      ->get();
      return view('sala.sala_prof')->with(compact('user'))->with(compact('turma'));

    }
}
