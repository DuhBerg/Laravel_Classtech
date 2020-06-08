<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Illuminate\Database\QueryException;
use Auth;

class cadastroController extends Controller
{
  public function index()
  {
    if (Auth::check())
      {
          // The user is logged in...
          $id = Auth::user()->id;
          $user = User::find($id);
          if($user->nivel_acesso == 'admin')
          {
            return redirect()->route('admin.index');
          }
          if($user->nivel_acesso == 'aluno')
          {
            return redirect()->route('aluno.index');
          }
          if($user->nivel_acesso == 'professor')
          {
            return redirect()->route('professor.index');
          }
      }
    else  {
        return view('cadastro');
          }

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
        'foto_perfil' => $dados['foto'],
    ]);
          return redirect()->route('site.cadastro')->with('message', 'Cadrastro realizado com sucesso!');;
        }
        catch(\Illuminate\Database\QueryException $ex)
        {

          return redirect()->route('site.cadastro')->withErrors(['active'=>'Esse e-mail já existe!']);
        }



    }
}
