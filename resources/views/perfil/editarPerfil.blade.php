@extends('layout.site')
@section('titulo','Home')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')
@section('perfil-active','active')

@section('navbar')

@include('layout._includes.sidenav')

@endsection

<!--












ESSA TELA NAO ESTA SENDO USADA!














-->

@section('conteudo')

<div class="row">
  <h3 class="center">Editar perfil</h3>
  <div class="div-editar-perfil">
    <div class="col s12">
      <table class="highlight">
        <tbody>
          <tr class="modal-trigger" href="#modal-foto" style="cursor: pointer;">
            <td><b>Foto</b></td>
            <td><img class="circle foto-editar-perfil z-depth-1 right" src="{{$user->foto_perfil}}"></td>
          </tr>
          <tr onclick="location.href = '#';" style="cursor: pointer;">
            <td> <b>Nome</b> <br> {{Auth::user()->name}}</td>
            <td><span class="material-icons right">keyboard_arrow_right</span></td>
          </tr>
          <tr onclick="location.href = '#';" style="cursor: pointer;">
            <td> <b>Email</b> <br> {{Auth::user()->email}}</td>
            <td><span class="material-icons right">keyboard_arrow_right</span></td>
          </tr>
          <tr onclick="location.href = '#';" style="cursor: pointer;">
            <td> <b>Senha</b> <br> ··············</td>
            <td><span class="material-icons right">keyboard_arrow_right</span></td>
          </tr>
      </table>
    </div>
  </div>
</div>


<!-- Modal enviar foto -->

<div class="modal" id="modal-foto">
  <div class="modal-content">

    <h4 class="light">Alterar foto</h4>

    <form style="padding-top:20px;" action="{{ route('perfil.viewFoto.salvar') }}" method="post" enctype="multipart/form-data">

    {{ csrf_field()}}


    <div class="file-field  input-field">

      <div class="btn indigo lighten-2">
        <span>Selecionar imagem</span>
        <input type="file" name="imagem">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>



  <div class="modal-footer">

      <button class="waves-effect waves-light btn indigo lighten-2">Enviar</button>
      <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>

  </div>
</div>








<script>
  //Modal
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>


@endsection
