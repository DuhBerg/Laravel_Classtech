<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class loginController extends Controller
{

  public function index(){
    return view('login');
  }


  public function entrar(Request $req)
  {
    $dados = $req->all();
    if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password'],'nivel_acesso'=>'aluno']))
    {
     return redirect()->route('aluno.index');
    }
    else if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password'],'nivel_acesso'=>'professor']))
    {
    return redirect()->route('professor.index');
    }
    else if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password'],'nivel_acesso'=>'admin']))
    {
      return redirect()->route('admin.index');
    }
    else {
      return redirect()->route('site.cadastro');

    }

  }


  public function sair()
  {
    Auth::logout();
    return redirect()->route('site.index');
  }






}
