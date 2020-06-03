<?php

namespace App\Http\Controllers\professor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class professorController extends Controller
{
  public function index()
  {
    return view('professor.professorTela');
  }
}
