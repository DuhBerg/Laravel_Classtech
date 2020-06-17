<h1>O MLK FOI VC Q ESQUECEU A SENHA? {{ $user->name }}</h1>
<p>
  ACRICA AI NO RESET PARA RESETA SUA SENHA ENTAO KRL
<<<<<<< HEAD
  <a href="{{ url('resetPassword/'.$user->email) }}">Resetar senha</a>
=======
  <a href="{{ url('resetPassword/'.$user->email.'/'.$code) }}">Redefinir Senha</a> 
>>>>>>> 610b80c62cf8350f7ab5b0ae68ef022009a280c7


</p>
