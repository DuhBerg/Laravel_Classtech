<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class cadastroController extends Controller
{
    public function index(){
      return view('cadastro');
    }


    public function criar(Request $req)
    {
      $dados = $req->all();
      User::create([
          'name' => $dados['name'],
          'email' => $dados['email'],
          'password' => bcrypt($dados['password']),
      ]);
    return redirect()->route('site.login');
    }
}
