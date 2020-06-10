<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class perfilController extends Controller
{
    public function index()
    {
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
      return view('perfil.perfil',compact('user'));
    }


    public function viewFoto()
    {
      $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
      return view('perfil.editar_foto',compact('user'));
    }


    public function salvaFoto(Request $req)
    {

      if($req->hasFile('imagem')){

        $allowedfileExtension=['jpg','png'];
        $imagem = $req->file('imagem');
        $filename = $imagem->getClientOriginalName();
        $extension = $imagem->getClientOriginalExtension();
        $check=in_array($extension,$allowedfileExtension);


              if($check)
              {

              $num = Auth::user()->id;
              $dir = "img/fotos-perfil";
              $ex = "png";
              $nomeImagem = $num.".".$ex;
              $imagem->move($dir,$nomeImagem);
              $dados['foto_perfil'] = $dir."/".$nomeImagem;

              //dd($dados);
              $id = Auth::user()->id;

              User::find($id)->update($dados);
              return redirect()->route('perfil.index')->with('message', 'Foto alterada com sucesso!');
              }
                else { //erro se o arquivo nao for .png ou .jpg kkk
                  return redirect()->route('perfil.index')->withErrors(['active']);
                }
      }
    }



    public function editar_perfil()
    {
      return view('perfil.editar-perfil');
    }
}
