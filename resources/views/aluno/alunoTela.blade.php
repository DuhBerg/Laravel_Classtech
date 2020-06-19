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







<div class="modal" id="modal-entrar">
  <div class="modal-content">

    <h4 class="light">Entrar turma</h4>

    <form style="padding-top:10px;" action="{{ route('aluno.sala.criar') }}" method="post">


    <h6>Pergunte ao seu professor o código da sala e digite abaixo.</h6>


      {{ csrf_field() }}

    <div style="padding: 10px;" class="row">
      <div class="input-field">
        <input type="text" name="codigo" id="codigo">
        <label for="codigo">Código sala</label>
      </div>
    </div>

  </div>

  <div class="modal-footer">

      <button class="waves-effect waves-light btn indigo lighten-2">Entrar</button>
      <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>

  </div>
</div>


<section>

  <div class="row">


    <!-- Fazer foreach aqui!-->
    <!-- - - INICIO - - -->


    @foreach ($salas as $sala)


    <div class="col s12 m6 l4">
      <div class="card">
        <div class="card-image">
          <img src="{{$sala->foto_fundo}}">
          <span class="card-title">{{$sala->idTurma}}</span>
        </div>
        <div class="card-content">
          <p>{{$sala->disciplina}}</p>
        </div>
        <div class="card-action">
          <a href="#">Ver Sala</a>
        </div>
      </div>
    </div>

    @endforeach



  </div>

</section>




@endsection
