@extends('layout.site')
@section('titulo','Login')

@section('login','Login')
@section('cadastro','Cadastro')

@section('conteudo')


  <div class="container">

    <div class="row container">
      <form class="form-login" action="{{ route('site.login.entrar')}}" method="post">

      <h3>Entrar</h3>

       {{ csrf_field() }}


       <div class="input-field">
         <label>E-mail</label>
         <input type="text" name="email">
       </div>

        <div class="input-field">
          <label>Senha</label>
          <input type="password" name="password">
        </div>

        <form action="#">
        <p>
          <label>
            <input class="red" type="checkbox" />
            <span>Lembrar meus dados</span>
          </label>
        </p>

        <div class="padding-top-buttom">
          <button class="waves-effect waves-light btn indigo lighten-2 right">Entrar</button>
        </div>
        <a href="#" class="font-esqueci-senha">Esqueceu a senha?</a>

      </form>
    </div>
  </div>


@endsection
