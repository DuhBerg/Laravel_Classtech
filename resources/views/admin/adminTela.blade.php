@extends('layout.site')
@section('titulo','Admin')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')


@section('navbar')

@include('layout._includes.sidenav')

@endsection


@section('conteudo')
<h3>Olá {{Auth::user()->name}}!</h3>







</form>

<!--------------------------->


<div class="modal" id="modal-criar">
  <div class="modal-content">

    <h4 class="light">Criar professor</h4>


      <form style="padding-top:20px;" class="form-login" action="{{ route('admin.criarProf')}}" method="post">

        <div class="row">

        {{ csrf_field() }}

        <div class="input-field">
          <input type="text" name="name" id="name">
          <label for="name">Nome</label>
        </div>

        <div class="input-field">
          <input type="text" name="email" id="email">
          <label for="email">E-mail</label>
        </div>

        <div class="input-field">
          <input type="password" name="password" id="senha">
          <label for="senha">Senha</label>
        </div>
        <input type="hidden" name="nivel_acesso" value="professor">



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
