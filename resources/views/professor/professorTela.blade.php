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

      <form style="padding-top:20px;" action="{{ route('professor.turmas.criar') }}" method="post">

        {{ csrf_field() }}

      <div class="row">
        <div class="input-field">
          <input type="text" name="disciplina" id="disciplina">
          <label for="disciplina">Disciplina</label>
        </div>


      </div>

      <a href="#modal-tema" data-position="bottom"
      class="modal-trigger waves-effect waves-light btn indigo lighten-2">
        Selecionar tema
      </a>

    </div>

    <div class="modal-footer">
        <button class="waves-effect waves-light btn indigo lighten-2">Criar</button>
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
            <input type="radio" name="foto_fundo" value="tema_1">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_1.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="tema_2">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_2.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="tema_3">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_3.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="tema_4">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_4.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="tema_5">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_5.jpg">
          </label>

          <label>
            <input type="radio" name="foto_fundo" value="tema_6">
              <img style="padding: 0px;" class="col s12 m6 l6 tema"
              src="img/fotos-tema/tema_6.jpg">
          </label>

        </div>
      </div>
    </div>

  <div class="modal-footer">
    <button class="waves-effect waves-light btn indigo lighten-2">Selecionar</button>
  </div>
</div>

<!-- Fim modal tema -->


  <script>
    //Modal
    $(document).ready(function(){
      $('.modal').modal();
    });
  </script>


@endsection
