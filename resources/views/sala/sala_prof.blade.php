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
            <p style="padding-top:15px;">{{ $count}} Aluno(s)</p>
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
  @if(!empty($alunos))

  <center><h1>Alunos</h1></center>
  <div class="container">

    <h3 class="center">Lista de cursos</h3>
    <div class="row">
      <table>
        <thead>
          <tr>
            <th>Nome</th>
            <th>RA</th>
            <th>Imagem</th>
          </tr>
          @foreach($alunos as $aluno)
            <tr>
              <td>{{ $aluno->name }}</td>
              <td>{{ $aluno->ra }}</td>
              <td><img height="60" src="{{asset($aluno->foto_perfil)}}"/></td>
              <td>
                  <form action="{{ route('sala.deletar_aluno')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id_turma" value="{{$turmas->idTurma}}">
                    <input type="hidden" name="id_aluno" value="{{$aluno->id}}">
                  <button class="waves-effect waves-light btn indigo lighten-2">Deletar</button>
                  </form>
              </td>
            </tr>
          @endforeach
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>

    @else

    <h3 align="center">Você ainda não possui alunos!</h3>

    @endif
</div>
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

    <form style="padding-top:2px;" action="{{ route('sala.editar_nome')}}" method="post">
      {{csrf_field()}}
      <h5>Alterar nome</h5>
    <p> <b>Atenção!</b> Coloque a matéria e a turma que você ensina caso for alterar o nome</p>
    <p> <b>Exemplo:</b> Matemática - 1º ano </p>


      {{ csrf_field() }}

    <div style="padding: 5px;" class="row">
      <div class="input-field">
        <input type="text" name="nome_turma" id="nome_turma">
        <label for="nome_turma">Matéria e turma</label>
        <input type="hidden" name="id_turma" value="{{$turmas->idTurma}}">
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
