<nav>

  <div class="nav-wrapper nav-wrapper-color">


      <a href="{{ route('site.index') }}" class="brand-logo">Logo</a>


      <a href="#" data-target="slide-out" class="sidenav-trigger right" style="display:block">
        <img class="circle btn-sidenav" src="{{$user->foto_perfil}}">
      </a>


      <ul class="right">

        @if($user->nivel_acesso == 'aluno' && Request::is('aluno'))
          <li>
            <a href="#modal-entrar" data-position="bottom" data-tooltip="Entrar em uma turma"
            class="tooltipped modal-trigger btn-floating waves-effect waves-light z-depth-0 transparent btn-hover-color">
              <i class="material-icons">add</i>
            </a>
          </li>
        @endif

        @if($user->nivel_acesso == 'admin' && Request::is('admin'))
          <li>
            <a href="#modal-criar" data-position="bottom" data-tooltip="Criar um professor"
            class="tooltipped modal-trigger btn-floating waves-effect waves-light z-depth-0 transparent btn-hover-color">
              <i class="material-icons">add</i>
            </a>
          </li>
        @endif

        @if($user->nivel_acesso == 'professor' && Request::is('professor'))
          <li>
            <a href="#modal-criar" data-position="bottom" data-tooltip="Criar uma turma"
            class="tooltipped modal-trigger btn-floating waves-effect waves-light z-depth-0 transparent btn-hover-color">
              <i class="material-icons">add</i>
            </a>
          </li>
        @endif

      </ul>
</div>

  </div>
 </nav>

  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background"></div>
        <a href="#user"><img class="circle" src="{{asset($user->foto_perfil)}}"></a>
        <a href="#name"><span class="white-text name">@yield('perfil')</span></a>
        <a href="#email"><span class="white-text email">@yield('email')</span></a>
      </div>
    </li>

    <li class="@yield('home-active')"><a href="{{ route('site.index') }}"><i class="material-icons">home</i>Home</a></li>
    <li class="@yield('perfil-active')"><a href="{{ route('perfil.index') }}"><i class="material-icons">person</i>Perfil</a></li>
    @if($user->nivel_acesso == 'aluno')
    <li class="@yield('cursos-active')"><a href="#!"><i class="material-icons">menu_book</i>Cursos</a></li>
    <li class="@yield('agenda-active')"><a href="#!"><i class="material-icons">calendar_today</i>Agenda</a></li>
    @endif
    <li><div class="divider"></div></li>
    <li class="@yield('config-active')"><a href="#!"><i class="material-icons">settings</i>Configuração</a></li>
    <li><a href="{{ route('login.sair') }}"><i class="material-icons">exit_to_app</i>Sair</a></li>
  </ul>
