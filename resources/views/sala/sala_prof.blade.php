@extends('layout.site')
@section('titulo','Turma')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')


@section('navbar')

@include('layout._includes.navbar_curso_prof')

@endsection


@section('conteudo')




@foreach($turma as $turmas)

<!-- Inicio tab navbar conteudo -->

<div id="curso" class="col s12">

<!-- Inicio tab home -->

  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card">
          <div class="card-image">
            <img style="height:200px;object-fit:cover;" src="{{$turmas->foto_fundo}}">
            <span class="card-title">{{$turmas->disciplina}}</span>
             <a href="#modal-editar" class="modal-trigger btn-floating halfway-fab waves-effect waves-light indigo lighten-2">
               <i class="material-icons">edit</i>
             </a>
          </div>
          <div class="card-content">
            <p>Código: {{$turmas->idTurma}}</p>
            <p style="padding-top:15px;">20 alunos</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Fim tab home -->

<!-- Inicio tab atividades -->

<div id="atividades" class="col s12">
  <h1>Atividades</h1>
</div>

<!-- Fim tab atividades -->

<!-- Inicio tab alunos -->

<div id="alunos" class="col s12">
  <h1>Alunos</h1>
</div>

<!-- Fim tab alunos -->

<!-- Inicio tab notas -->

<div id="notas" class="col s12">
  <h1>Notas</h1>
</div>

<!-- Fim tab notas -->

<!-- Fim tab navbar conteudo -->

<!-- Inicio modal editar -->

<div class="modal modal-fixed-footer" id="modal-editar">
  <div class="modal-content">

    <h4 class="light">Editar turma</h4>

    <form style="padding-top:2px;" action="" method="post">

      <h5>Alterar nome</h5>
    <p> <b>Atenção!</b> Coloque a matéria e a turma que você ensina caso for alterar o nome</p>
    <p> <b>Exemplo:</b> Matemática - 1º ano </p>


      {{ csrf_field() }}

    <div style="padding: 5px;" class="row">
      <div class="input-field">
        <input type="text" name="SLA" id="SLA">
        <label for="SLA">Matéria e turma</label>
      </div>
    </div>

  </div>

  <div class="modal-footer">

      <button class="waves-effect waves-light btn indigo lighten-2">Entrar</button>
      <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>

  </div>
</div>

<!-- Fim modal editar -->

@endforeach

@endsection
