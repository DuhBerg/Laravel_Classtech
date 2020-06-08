@extends('layout.site')
@section('titulo','Login')

@section('login','Login')
@section('cadastro','Cadastro')

@section('cadastro-active','active')


@section('navbar')

@include('layout._includes.navbar')

@endsection


@section('conteudo')

          <div class="row">
            <form class="form-login" action="{{ route('site.cadastro.criar')}}" method="post">
              <h3>Cadastro</h3>

              {{ csrf_field() }}

              <div class="input-field">
                <input type="text" name="name" id="name">
                <label for="name">Nome</label>
              </div>

              <div class="input-field">
                <input type="text" name="email" id="email">
                <label for="email">E-mail</label>
              </div>

              <div class="input-field">
                <input type="password" name="password" id="senha">
                <label for="senha">Senha</label>
              </div>

              <input type="hidden" name="nivel_acesso" value="aluno">
              <input type="hidden" name="foto" value="img/fotos-perfil/default.png">

              <div class="padding-top-buttom">
                <a href="{{ route('site.login') }}" class="waves-effect waves-light btn indigo lighten-2">Tenho uma conta</a>
                <button class="waves-effect waves-light btn indigo lighten-2 right">Criar</button>
              </div>
            </form>
          </div>


@endsection
