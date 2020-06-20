@extends('layout.site')
@section('titulo','Aluno')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')
@section('home-active','active')


@section('navbar')

@include('layout._includes.sidenav')

@endsection



@section('conteudo')
<h3>Olá {{Auth::user()->name}}!</h3>

          <div class="row">
            <form class="form-login" action="{{ route('aluno.addEmail')}}" method="post">

              {{ csrf_field() }}

              <div class="input-field">
                <input type="email" name="email" id="email" class="validate">
                <label data-error="E-mail inválido" for="email">E-mail</label>
                <span class="helper-text" data-error="E-mail inválido"></span>
              </div>

            <div class="padding-top-buttom">
              <button class="waves-effect waves-light btn indigo lighten-2 right">Confirmar meu e-mail</button>
            </div>
          </form>
        </div>

@endsection
