<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class adminController extends Controller
{
  public function index()
  {
    $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
    return view('admin.adminTela',compact('user'));
  }

  public function criar(Request $req)
  {
    try{
      $dados = $req->all();
      $senha = bcrypt($dados['password']);
      //dd($dados);
      User::create([
      'name' => $dados['name'],
      'ra' => $dados['ra'],
      'password' => $senha,
      'nivel_acesso' => $dados['nivel_acesso'],
      'foto_perfil' => $dados['foto'],
  ]);
        return redirect()->route('admin.index')->with('message', 'Cadastro realizado com sucesso!');;
      }
      catch(\Illuminate\Database\QueryException $ex)
      {

        return redirect()->route('admin.index')->withErrors(['active'=>'Esse usuário já existe!']);
      }



  }









  }
