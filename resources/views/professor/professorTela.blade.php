@extends('layout.site')
@section('titulo','Professor')
@section('perfil','Professor')
@section('sair','Sair')

@section('conteudo')
<h3>Olá Professor!</h3>


<a href="{{ route('professor.turmas.index') }}"> <b>CRIAR TURMA</b> </a>

  <a href="#modal-criar" class="btn modal-trigger waves-effect waves-light indigo lighten-2">Criar turma</a>

  <div class="modal" id="modal-criar">
    <div class="modal-content">

      <h4 class="light">Criar turma</h4>

      <form style="padding-top:20px;" action="{{ route('professor.turmas.criar') }}" method="post">

        {{ csrf_field() }}

      <div class="row">
        <div class="input-field">
          <input type="text" name="disciplina" id="disciplina">
          <label for="disciplina">Disciplina</label>
        </div>
      </div>

    </div>

    <div class="modal-footer">

        <button class="waves-effect waves-light btn indigo lighten-2">Criar</button>

      <a class="btn modal-close modal-action waves-effect waves-light indigo lighten-2">Sair</a>
    </div>
  </div>


  <script>
    //Modal
    $(document).ready(function(){
      $('.modal').modal();
    });
  </script>


@endsection
