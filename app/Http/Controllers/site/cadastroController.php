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
      $dados = $req->all();
      try{
          User::create($dados);
          return redirect()->route('site.login');
        }catch(\Illuminate\Database\QueryException $ex){
          return redirect()->route('site.cadastro');
        }



    }
}
