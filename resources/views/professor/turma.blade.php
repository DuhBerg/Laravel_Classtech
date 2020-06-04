@extends('layout.site')
@section('titulo','Professor')
@section('perfil','Professor')
@section('sair','Sair')

@section('conteudo')
<h3>Olá Professor!</h3>






<form class="fodase" action="{{ route('professor.turmas.criar') }}" method="post">

  {{ csrf_field() }}

  <div class="input-field">
    <label>Disciplina</label>
    <br><br>
    <input type="text" name="disciplina">
  </div>


  <div class="padding-top-buttom">
          <button class="waves-effect waves-light btn indigo lighten-2 right">Criar</button>
        </div>




</form>



@endsection
