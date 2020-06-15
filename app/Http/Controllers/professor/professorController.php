<?php

namespace App\Http\Controllers\professor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Sala;
use App\Turma;

class professorController extends Controller
{
  public function index()
  {
    $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
    $turmas= Turma::select('turma.*')
    ->where('idProfessor', $user['id'])
    ->get();
    return view('professor.professorTela',compact('user','turmas'));
  }
}
