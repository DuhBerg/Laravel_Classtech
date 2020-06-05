@extends('layout.site')
@section('titulo','Admin')
@section('perfil','Admin')
@section('sair','Sair')

@section('conteudo')
<h3>Olá Admin!</h3>




<h5>Formulário para adicionar professor </h5>

<div class="row">
  <form class="form-login" action="{{ route('admin.criarProf')}}" method="post">
    <h3>Cadastro</h3>

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

    <div class="padding-top-buttom">
      <button class="waves-effect waves-light btn indigo lighten-2 right">Criar</button>
    </div>
  </form>
</div>





</form>



@endsection
