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







<div class="modal" id="modal-criar">
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

    <a class="btn modal-close modal-action waves-effect waves-light indigo lighten-2">Sair</a>
  </div>
</div>


<section>

  <div class="row">


    <!-- Fazer foreach aqui!-->
    <!-- - - INICIO - - -->

    <div class="col s12 m6 l4">
      <div class="card">
        <div class="card-image">
          <img src="http://vetplus.vet.br/wp-content/uploads/2019/12/meme-da-mulher-gritando-com-o-gato-na-mesa-og-1080x630.jpg">
          <span class="card-title">Lorem Ipsum</span>
        </div>
        <div class="card-content">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <div class="card-action">
          <a href="#">Botão</a>
        </div>
      </div>
    </div>

    <!-- - - FIM - - -->

  </div>

</section>

<!--
@foreach ($salas as $sala)

  <h3>{{$sala->idTurma}}</h3>

@endforeach
-->

<script>
  //Modal
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>


@endsection
