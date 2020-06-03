<?php

namespace App\Http\Controllers\professor;

use Illuminate\Http\Request;

class turmaController extends Controller
{
    public function index()
    {
      return view('turma');
    }



    public funcion criar()
    {
      $idTurma = randString();
      dd($idTurma);

    }


    public function randString($length){
           $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
           $charactersLength = strlen($characters);
           $randomString = '';
           for ($i = 0; $i < $length; $i++) {
               $randomString .= $characters[rand(0, $charactersLength - 1)];
           }
           return $randomString;

       }



}
