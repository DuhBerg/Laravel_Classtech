@extends('layout.site')
@section('titulo','Aluno')
@section('perfil','Aluno')
@section('sair','Sair')

@section('conteudo')
<h3>Olá Aluno!</h3>


<form class="" action="{{ route('aluno.sala.criar') }}" method="post">

  {{ csrf_field() }}


  <div class="input-field">
    <label>Código da Turma</label>
    <br><br>
    <input type="text" name="codigo">
  </div>


  <div class="padding-top-buttom">
          <button class="waves-effect waves-light btn indigo lighten-2 right">Entrar</button>
        </div>


</form>



@endsection
