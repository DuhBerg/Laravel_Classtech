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
            <img style="height:200px;object-fit:cover;" src="{{asset($turmas->foto_fundo)}}">
            <span class="card-title" id="disciplina">{{$turmas->disciplina}}</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red">
              <i class="material-icons">delete</i>
            </a>
            <a href="#modal-editar" style="right:70px;" class="modal-trigger btn-floating halfway-fab waves-effect waves-light indigo lighten-2">
              <i class="material-icons">edit</i>
            </a>
          </div>
          <div class="card-content">
            <p>Código: {{$turmas->idTurma}}</p>
            <p style="padding-top:15px;" id="count-alunos">{{ $count_aceitos}} Aluno(s)</p>
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


  <div class="container" id="table-alunos">
    <a href="#modal-solicitacoes" class="btn-solicitacao btn-floating btn-large modal-trigger tooltipped indigo lighten-2 pulse"
    data-position="left" data-tooltip="Solicitações"><i class="material-icons">person_add</i></a>

    @if(!empty($alunos_aceitos_array))
    <div class="row">
      <table>
        <thead>
          <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>RA</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($alunos_aceitos_array as $aluno)
            <tr id="tr-aluno-aceito">
              <td><img style="height:60px;width:60px;object-fit:cover;" class="circle" src="{{asset($aluno->foto_perfil)}}"/></td>
              <td>{{ $aluno->name }}</td>
              <td>{{ $aluno->ra }}</td>
              <td>
                  <form name="form_deletar">
                    {{csrf_field()}}
                    <input type="hidden" name="id_turma" value="{{$turmas->idTurma}}">
                    <input type="hidden" name="id_aluno" value="{{$aluno->id}}">
                  <button class="waves-effect waves-light btn indigo lighten-2 right">Deletar</button>
                  </form>
              </td>
            </tr>
          @endforeach
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

    <form style="padding-top:2px;" name="form_editar">
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

      <button class="waves-effect waves-light btn indigo lighten-2">Confirmar</button>
      <a class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>

    </form>

  </div>
</div>

<!-- Fim modal editar -->





<!-- Inicio modal solicitações -->

<div class="modal modal-fixed-footer" id="modal-solicitacoes">
    <div class="modal-content">


      @if(!empty($alunos_pendentes_array))
      <h4 class="light">Solicitações</h4>
      <h6>Aceite os alunos dessa turma que você ensina</h6>

      <table>
        <thead>
          <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>RA</th>
            <th></th>
            <th></th>
          </tr>

        </thead>
        <tbody>
          @foreach($alunos_pendentes_array as $aluno)
            <tr id="tr-aluno">
              <td><img style="height:60px;width:60px;object-fit:cover;" class="circle" src="{{asset($aluno->foto_perfil)}}"/></td>
              <td>{{ $aluno->name }}</td>
              <td>{{ $aluno->ra }}</td>



              <form class="" name="form_aceitar">
              {{csrf_field()}}

              <input type="hidden" id="idAluno" name="idAluno" value="{{$aluno->id}}">
              <input type="hidden" id="idTurma" name="idTurma" value="{{$turmas->idTurma}}">


              <td><button id="btn-aceitar" class="waves-effect waves-light btn indigo lighten-2 right">Aceitar</button></td>

              </form>




              <form class="" name="form_recusar">
                {{csrf_field()}}

              <input type="hidden" id="idAluno" name="idAluno" value="{{$aluno->id}}">
              <input type="hidden" id="idTurma" name="idTurma" value="{{$turmas->idTurma}}">

              <td><button id="btn-recusar" class="waves-effect waves-light btn red">Recusar</button></td>

              </form>

            </tr>
          @endforeach
        </tbody>
      </table>
        @else
          <h4 class="center light">Você não possui solicitações!</h4>
        @endif
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
    </div>
  </div>
</div>




<!-- Fim modal solicitações -->


@endforeach


<script>

$(function(){
    $('form[name="form_aceitar"]').submit(function(event){
      event.preventDefault();

      $.ajax({
        url:  "{{ route('professor.sala.aceitarAlunos') }}",
        type: "post",
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response){
          console.log(response);
          if(response.success === true)
          {
            document.querySelector('#tr-aluno').remove();
            if(response.alunos_notificacao != 0)
            {
              document.querySelector('#count-pendente').innerHTML = response.alunos_notificacao;
            }
            else {
              document.querySelector('#count-pendente').remove();
            }
            console.log("pendentes = "+response.alunos_notificacao);

          }
        }
      });

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: 'Aluno aceito'
      })
    });
});


$(function(){
    $('form[name="form_recusar"]').submit(function(event){
      event.preventDefault();

      Swal.fire({
        title: 'Você realmente deseja recusa-lo?',
        text: false,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Não',
        confirmButtonColor: '#7986cb',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim'
      }).then((result) => {

        if (result.value) {

          $.ajax({
            url:  "{{ route('professor.sala.recusarAlunos') }}",
            type: "post",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response){
              console.log(response);
              if(response.success === true){
                document.querySelector('#tr-aluno').remove();
                if(response.alunos_notificacao != 0)
                {
                  document.querySelector('#count-pendente').innerHTML = response.alunos_notificacao;
                }
                else {
                  document.querySelector('#count-pendente').remove();
                }
              }
            }
          });

          Swal.fire(
            'Aluno recusado!',
            false,
            'success'
          )
        }
      })



    });
});



$(function(){
    $('form[name="form_editar"]').submit(function(event){
      event.preventDefault();


      $.ajax({
        url: "{{ route('professor.sala.editar_nome') }}",
        type: "post",
        data: $(this).serialize(),
        dataType: 'json',
        success: function(dados)
        {
          console.log(dados);
          if(dados.success === true)
          {
            document.querySelector('#disciplina').innerHTML = "<span class='card-title' id='disciplina'>"+ dados.nome_turma +"</span>";

          }
        }
      });

      Swal.fire(
        'Nome alterado!',
        false,
        'success'
      )


    });
});



$(function(){
  $('form[name="form_deletar"]').submit(function(event){
    event.preventDefault();


    $.ajax({
      url: "{{ route('professor.sala.deletar_aluno') }}",
      type: "post",
      data: $(this).serialize(),
      dataType: 'json',
      success: function(deleta)
      {
        console.log(deleta);
        if(deleta.success === true)
        {
          document.querySelector('#tr-aluno-aceito').remove();
          console.log(deleta.alunos);

          if(deleta.alunos.length == 0)
          {
            document.querySelector('#table-alunos').innerHTML = "<a href='#modal-solicitacoes' class='modal-trigger btn waves-effect waves-light indigo lighten-2 right'>Solicitações</a>"+
            "<h3 align='center'>Você ainda não possui alunos!</h3>";
            document.querySelector('#count-alunos').innerHTML = "<p style='padding-top:15px;' id='count-alunos'> 0 Aluno(s) </p>";
            //alert("Nenhum aluno no curso!");
          }
        }
      }

    });
  });
});










</script>





@endsection
