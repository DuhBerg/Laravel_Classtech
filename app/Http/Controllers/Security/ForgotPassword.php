<?php

namespace App\Http\Controllers\Security;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;
use Reminder;
use App\User;
use Mail;
use Crypt;

class ForgotPassword extends Controller
{
    public function forgot(){
      return view('security.forgot');
    }



    public function password(Request $req){
      $user = User::whereEmail($req->email)->first();

      if($user == null){
        return redirect()->back()->with(['error' => 'Email não existe!']);
      }
      $user = Sentinel::findById($user->id);
      $this->sendEmail($user);

      return redirect()->back()->with(['sucess'=>'O link para resetar a senha foi enviado para o seu email.']);
    }



    public function sendEmail($user)
    {
      $email = Crypt::encrypt($user->email);
      $procura_id = User::select('id')->whereEmail($user->email)->first();

      foreach($procura_id as $id)
        {
          $id_crypt = Crypt::encrypt($id);
          Mail::send('email.forgot',['user'=> $user, 'email' => $email, 'id'=>$id_crypt], function($message) use ($user)
          {
          $message->to($user->email);
          $message->subject("$user->name, Redefinir sua senha.");
          }
        );
        }
    }




    public function resetSenha(Request $req)
    {

    }







}
