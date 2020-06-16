@extends('layout.site')
@section('titulo','Login')

@section('login','Login')
@section('cadastro','Cadastro')

@section('login-active','active')


@section('navbar')

@include('layout._includes.navbar')

@endsection


@section('conteudo')


    <div class="row">
      <form class="form-login" action="{{ route('site.login.entrar')}}" method="post">

        <h3>Entrar</h3>

        {{ csrf_field() }}


        <div class="input-field">
          <input type="text" name="ra" id="ra">
          <label for="ra">RA</label>
        </div>

        <div class="input-field">
          <input type="password" name="password" id="senha">
          <label for="senha">Password</label>
        </div>

        <form action="#">
        <p>
          <label class="form-group">
            <input type="checkbox" name="rememberMe"/>
            <span>Lembrar meus dados</span>
          </label>
        </p>

        <div class="padding-top-buttom">
          <button class="waves-effect waves-light btn indigo lighten-2 right">Entrar</button>
        </div>


      </form>
    </div>


@endsection
