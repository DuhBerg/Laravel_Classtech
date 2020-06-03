@extends('layout.site')
@section('titulo','Login')

@section('login','Login')
@section('registrar','Registrar')

@section('conteudo')


  <div class="container">
    <h3 class="center">Entrar</h3>
    <div class="row container">
      <form class="form-login" action="{{ route('site.login.entrar')}}" method="post">

       {{ csrf_field() }}


       <div class="input-field">
         <label>E-mail</label>
         <input type="text" name="email">
       </div>

        <div class="input-field">
          <label>Senha</label>
          <input type="password" name="password">
        </div>



        <button class="btn deep-orange col s12">Entrar</button>
      </form>
    </div>
  </div>


@endsection
