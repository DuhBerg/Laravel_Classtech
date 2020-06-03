@extends('layout.site')
@section('titulo','Login')

@section('login','Login')
@section('cadastro','Cadastro')

@section('conteudo')

        <div class="container">
          <div class="row">
            <form class="form-login" action="{{ route('site.cadastro.criar')}}" method="post">
              <h3>Cadastro</h3>

              {{ csrf_field() }}

              <div class="input-field">
                <label>Nome</label>
                <input type="text" name="name">
              </div>

              <div class="input-field">
                <label>E-mail</label>
                <input type="text" name="email">
              </div>

              <div class="input-field">
                <label>Senha</label>
                <input type="password" name="password">
              </div>

              <div class="padding-top-buttom">
                <a href="{{ route('site.login') }}" class="waves-effect waves-light btn indigo lighten-2">Tenho uma conta</a>
                <button class="waves-effect waves-light btn indigo lighten-2 right">Criar</button>
              </div>

            </form>
          </div>
        </div>

@endsection
