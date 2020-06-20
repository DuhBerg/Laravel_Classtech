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
        else {

        $user = Sentinel::findById($user->id);
        $this->sendEmail($user);
        return redirect()->back()->with(['sucess'=>'O link para resetar a senha foi enviado para o seu email.']);
        }
    }



    public function sendEmail($user)
    {

          $email = Crypt::encrypt($user->email);
          $id = Crypt::encrypt($user->id);
          Mail::send('email.message_view.forgot',['user'=> $user, 'email' => $email, 'id'=>$id], function($message) use ($user)
          {
          $message->to($user->email);
          $message->subject("$user->name, Redefinir sua senha.");
          });
        }





    public function resetSenha_index(Request $req)
    {
      $email = Crypt::decrypt($req->email);
      $id = Crypt::decrypt($req->id);
      return view('email.email_telas.esqueciSenha', ['email'=>$email,'id'=>$id]);
    }





    public function resetSenha(Request $req)
    {
      $dados = $req->all();
      $senha = bcrypt($dados['password']);

      if(User::find($dados['id'])->update(['password'=>$senha]))
      {
        echo "Senha alterada com sucesso!";
        // COLOCAR RETURN PRA VIEW E MOSTRAR MENSAGEM BONITINHA!!!!! -------------------------------
      }
      else {
        echo "Não foi possível alterar sua senha!";
      }


    }







}
