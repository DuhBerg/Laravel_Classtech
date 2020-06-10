@extends('layout.site')
@section('titulo','Aluno')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')
@section('perfil-active','active')


@section('navbar')

@include('layout._includes.sidenav')

@endsection



@section('conteudo')

<div class="row">
  <h3 class="center">Perfil</h3>
  <div class="div-perfil">
    <div class="col s12 m12 l4 center">
      <a class="modal-trigger foto-hover" href="#modal-foto">
      <img class="circle foto-perfil z-depth-3" src="{{$user->foto_perfil}}">
    </a>
        <span class="material-icons icon-edit z-depth-1">edit</span>
        <p style="color:#7986cb;font-size:20px;font-weight: 600;">Alterar foto</p>
      <!-- <a class="modal-trigger btn indigo lighten-2 right" href="#modal-foto">Editar foto</a> -->
    </div>
    <div class="col s12 m12 l8">
      <table class="highlight">
        <tbody>
          <tr onclick="location.href = '#';" style="cursor: pointer;">
            <th>Nome</th>
            <td>{{Auth::user()->name}}</td>
            <td><span class="material-icons right">keyboard_arrow_right</span></td>
          </tr>
          <tr onclick="location.href = '#';" style="cursor: pointer;">
            <th>Email</th>
            <td>{{Auth::user()->email}}</td>
            <td><span class="material-icons right">keyboard_arrow_right</span></td>
          </tr>
          <tr onclick="location.href = '#';" style="cursor: pointer;">
            <th>Senha</th>
            <td>************</td>
            <td><span class="material-icons right">keyboard_arrow_right</span></td>
          </tr>


      </table>
    </div>
  </div>

</div>




<!-- Modal enviar foto -->

<div class="modal" id="modal-foto" aria-hidden="true">
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

    <br>



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
