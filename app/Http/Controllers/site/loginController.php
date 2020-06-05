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
  try{
    $dados = $req->all();

    $rememberMe = false;

    if(isset($req->rememberMe))
    $rememberMe = true;


      if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password'],'nivel_acesso'=>'aluno'],$rememberMe))
      {
        return redirect()->route('aluno.index');
      }
      else if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password'],'nivel_acesso'=>'professor'],$rememberMe))
      {
        return redirect()->route('professor.index');
      }
      else if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password'],'nivel_acesso'=>'admin'],$rememberMe))
      {
        return redirect()->route('admin.index');
      }
      else {
        return redirect()->route('site.cadastro');

      }
    }catch(\Illuminate\Database\QueryException $ex){
      return redirect()->route('site.login');
    }


  }


  public function sair()
  {
    Auth::logout();
    return redirect()->route('site.index');
  }






}
