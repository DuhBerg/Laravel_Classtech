@extends('layout.site')
@section('titulo','Professor')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')
@section('home-active','active')


@section('navbar')

@include('layout._includes.sidenav')

@endsection


@section('conteudo')
<h3>Olá {{Auth::user()->name}}!</h3>



<!-- Inicio modal criar turma -->

<div class="modal modal-fixed-footer" id="modal-criar">
    <div class="modal-content">

      <h4 class="light">Criar turma</h4>
      <p style="padding-top:5px;">Coloque a matéria e a turma que você ensina.</p>
      <p> <b>Exemplo:</b> Matemática - 1º ano </p>

      <form style="padding-top:20px;" action="{{ route('professor.turmas.criar') }}" method="post">

        {{ csrf_field() }}

      <div class="row">

        <div class="input-field">

          <input type="text" name="disciplina" id="disciplina">
          <label for="disciplina">Matéria e turma</label>
        </div>


      </div>

      <a href="#modal-tema" data-position="bottom"
      class="modal-trigger waves-effect waves-light btn indigo lighten-2">
        Selecionar tema
      </a>

    </div>

    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    </div>
  </div>



<!-- Fim modal criar turma -->





<!-- Inicio modal tema -->

<div class="modal modal-fixed-footer" id="modal-tema">
  <div class="modal-content">
    <h4 class="light">Selecione um tema</h4>
      <div class="row center">
        <div class="box-tema">

          <label>
            <input type="radio" name="foto_fundo" value="img/fotos-tema/tema_1.jpg">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_1.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="img/fotos-tema/tema_2.jpg">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_2.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="img/fotos-tema/tema_3.jpg">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_3.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="img/fotos-tema/tema_4.jpg">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_4.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="img/fotos-tema/tema_5.jpg">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_5.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="img/fotos-tema/tema_6.jpg">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_6.jpg">
          </label>

        </div>
      </div>
    </div>

  <div class="modal-footer">
    <button class="waves-effect waves-light btn indigo lighten-2">Criar</button>
  </div>
</div>


</form>

<!-- Fim modal tema -->



<section>

  <div class="row">


    <!-- Fazer foreach aqui!-->
    <!-- - - INICIO - - -->


    @foreach ($turmas as $turma)


    <div class="col s12 m6 l4">
      <div class="card small">
        <div class="card-image">
          <img src="{{$turma->foto_fundo}}">
          <span class="card-title">{{$turma->disciplina}}</span>
        </div>
        <div class="card-content">
          <p>Código: {{$turma->idTurma}}</p>
        </div>
        <div class="card-action">

          <form action="{{ route('sala.index') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="idTurma" value="{{$turma->idTurma}}">

              <button class="waves-effect waves-light btn indigo lighten-2">Ver Sala</button>
          </form>


        </div>
      </div>
    </div>

    @endforeach



  </div>

</section>











  <script>
    //Modal
    $(document).ready(function(){
      $('.modal').modal();
    });
  </script>


@endsection
