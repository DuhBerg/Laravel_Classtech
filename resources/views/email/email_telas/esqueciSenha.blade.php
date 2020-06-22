


<form class="" action="{{ route('senha.resetSenha') }}" method="post">
  {{ csrf_field() }}
  <div class="input-field">


    <label for="password">Nova Senha:</label>
    <br>
    <input type="password" name="password" id="password">
  </div>


  <input type="hidden" name="email" value="{{$email}}">
  <input type="hidden" name="id"    value="{{$id}}">



    <br>
  <button class="waves-effect waves-light btn indigo lighten-2">Atualizar</button>

</form>
