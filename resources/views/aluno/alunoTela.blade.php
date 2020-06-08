@extends('layout.site')
@section('titulo','Aluno')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')


@section('navbar')

@include('layout._includes.sidenav')

@endsection



@section('conteudo')
<h3>Olá {{Auth::user()->name}}!</h3>





<a href="#modal-criar" class="btn modal-trigger waves-effect waves-light indigo lighten-2">Entrar sala</a>

<div class="modal" id="modal-criar">
  <div class="modal-content">

    <h4 class="light">Entrar sala</h4>

    <form style="padding-top:20px;" action="{{ route('aluno.sala.criar') }}" method="post">

      {{ csrf_field() }}

    <div class="row">
      <div class="input-field">
        <input type="text" name="codigo" id="codigo">
        <label for="codigo">Código sala</label>
      </div>
    </div>

  </div>

  <div class="modal-footer">

      <button class="waves-effect waves-light btn indigo lighten-2">Entrar</button>

    <a class="btn modal-close modal-action waves-effect waves-light indigo lighten-2">Sair</a>
  </div>
</div>





@foreach ($salas as $sala)

  <h3>{{$sala->idTurma}}</h3>

@endforeach








<script>
  //Modal
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>


@endsection
