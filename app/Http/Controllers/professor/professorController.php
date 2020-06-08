<?php

namespace App\Http\Controllers\professor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class professorController extends Controller
{
  public function index()
  {
    $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
    return view('professor.professorTela',compact('user'));
  }
}
