<?php

namespace App\Http\Controllers\aluno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class alunoController extends Controller
{
    public function index()
    {
      return view('aluno.alunoTela');
    }
}
