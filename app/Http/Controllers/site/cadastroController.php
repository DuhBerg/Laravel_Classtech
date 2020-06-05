<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Illuminate\Database\QueryException;

class cadastroController extends Controller
{
    public function index(){
      return view('cadastro');
    }


    public function criar(Request $req)
    {
      try{
        $dados = $req->all();
        $senha = bcrypt($dados['password']);
        //dd($dados);
        User::create([
        'name' => $dados['name'],
        'email' => $dados['email'],
        'password' => $senha,
        'nivel_acesso' => $dados['nivel_acesso'],
    ]);
          return redirect()->route('site.login');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
          return redirect()->route('site.cadastro');
        }



    }
}
