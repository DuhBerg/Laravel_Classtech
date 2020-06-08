<nav>

  <div class="nav-wrapper nav-wrapper-color">
    <div class="row">


      <a href="{{ route('site.index') }}" class="brand-logo">Logo</a>

      <a href="#" data-target="slide-out" class="sidenav-trigger right" style="display:block">@yield('perfil')</a>

</div>

  </div>
 </nav>

  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background"></div>
        <a href="#user"><img class="circle" src="{{$user->foto_perfil}}"></a>
        <a href="#name"><span class="white-text name">@yield('perfil')</span></a>
        <a href="#email"><span class="white-text email">@yield('email')</span></a>
      </div>
    </li>

    <li><a href="{{ route('site.index') }}"><i class="material-icons">home</i>Home</a></li>
    <li><a href="{{ route('perfil.index') }}"><i class="material-icons">person</i>Perfil</a></li>
    @if($user->nivel_acesso == 'aluno')
    <li><a href="#!"><i class="material-icons">menu_book</i>Cursos</a></li>
    @endif
    <li><div class="divider"></div></li>
    <li><a href="#!"><i class="material-icons">settings</i>Configuração</a></li>
    <li><a href="{{ route('login.sair') }}"><i class="material-icons">exit_to_app</i>Sair</a></li>
  </ul>
