<?php

namespace App\Http\Controllers\Security;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;
use Reminder;
use App\User;
use Mail;

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
<<<<<<< HEAD
      $this->sendEmail($user);

      return redirect()->back()->with(['sucess'=>'Reset code sent to your email.']);
    }

    public function sendEmail($user){
      Mail::send(
        'email.forgot',
        ['user'=> $user],
=======
      $reminder = Reminder::exists($user) ? : Reminder::create($user);
      $this->sendEmail($user,$reminder->code);

      return redirect()->back()-with(['sucess'=>'Reset code sent to your email.']);
    }

    public function sendEmail($user,$code){
      Mail::send(
        'email.forgot',
        ['user'=> $user,'code'=>$code],
>>>>>>> 610b80c62cf8350f7ab5b0ae68ef022009a280c7
        function($message) use ($user){
          $message->to($user->email);
          $message->subject("$user->name, Redefinir sua senha.");
        }
      );
    }
}
