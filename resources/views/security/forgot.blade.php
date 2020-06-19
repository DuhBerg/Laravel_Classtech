@extends('layout.site')
@section('titulo','Esqueci senha')
@section('login','Login')

@section('navbar')

@include('layout._includes.navbar')

@endsection


@section('conteudo')

  <div class="row">

    <h3 class="center">Esqueci senha</h3>
    <h6 class="center">Coloque o e-mail cadastrado abaixo, enviaremos uma mensagem para alteração da senha</h6>

    <div class="col s12">

      <form class="form-esqueci-senha"  action="{{ url('/forgotPassword') }}" method="post">
       {{ csrf_field() }}

       @if(session('error'))
         <div>{{ session('error') }}</div>
       @endif

       @if(session('sucess'))
       <div>{{ session('sucess') }}</div>
       @endif


       <div class="input-field">
         <input type="email" name="email" id="email" class="validate">
         <label data-error="E-mail inválido" for="email">E-mail</label>
         <span class="helper-text" data-error="E-mail inválido"></span>
       </div>

       <button type="submit" class="waves-effect waves-light btn indigo lighten-2 right">Enviar</button>
      </form>

    </div>

  </div>

@endsection
