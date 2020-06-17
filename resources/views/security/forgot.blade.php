<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ESQUECEU A SENHA KRL ? AI E FODA EM</title>
  </head>
  <body>
     <form  action="{{ url('/forgotPassword') }}" method="post">
      {{ csrf_field() }}

      @if(session('error'))
        <div>{{ session('error') }}</div>
      @endif

      @if(session('sucess'))
      <div>{{ session('sucess') }}</div>
      @endif

      <input type="email" name="email" id="email">
      <button type="submit">Enviar</button>
     </form>
  </body>
</html>
