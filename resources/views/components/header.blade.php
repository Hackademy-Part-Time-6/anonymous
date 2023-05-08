<div class="main-header fixed" data-theme="">
  <div class="brand">
    <button class="toggle-button icon-menu" data-theme=""></button>
    <a href="{{route('revisor.home')}}" class="brand__link">
      <img src="{{ asset('./image/logo.png') }}" alt="Logo Anonymous" class="brand__img" />
    </a>
  </div>
  <!-- Formulario de Busqueda -->
  <nav class="menu__panel">
    <div class="menu__panel-box">
      <form action="#" class="menu__panel-form">
        <input
          type="search"
          placeholder="Buscar..."
          class="menu__panel-form-input"
          data-number=""
        />
        <button
          type="submit"
          class="icon-search menu__panel-button"
        ></button>
      </form>
    </div>
    <div class="menu__panel-box">
      <button class="icon icon-bell"></button>
      <button class="icon icon-carpeta"></button>
    </div>
    <div class="menu__panel-box">
      <div class="menu__panel-user">
        <div class="profile center">
          <i class="icon-user"></i>
        </div>
        <div class="profile__menu-container">
          @auth
          <h1 class="profile__name">{{ Auth::user()->name }} <br /></h1>
           {{-- <span class="profile__rol">ROL</span> --}}
          @endauth
        @guest
            <h1 class="profile__name">Usuario Invitado</h1>
        @endguest
        
          <ul class="profile__menu">
            <li class="profile__menu-item">
              <i class="profile__menu-icon">I</i>
              <a href="#" class="profile__menu-link">Perfil</a>
            </li>
            <li class="profile__menu-item">
              <i class="profile__menu-icon">I</i>
              <a href="#" class="profile__menu-link">Editar</a>
            </li>
            <li class="profile__menu-item">
              <i class="profile__menu-icon">I</i>
              <a href="#" class="profile__menu-link">Mails</a>
            </li>
            <li class="profile__menu-item">
              <i class="profile__menu-icon">I</i>
              <a href="#" class="profile__menu-link">Configuraciones</a>
            </li>
            <li class="profile__menu-item">
              <i class="profile__menu-icon">I</i>
              <a href="#" class="profile__menu-link">Ayuda</a>
            </li>
            <li class="profile__menu-item">
              <i class="profile__menu-icon">I</i>
              <a id="logoutBtn" class="profile__menu-link" href="#">{{ __('Salir') }}</a>
            </li>

            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
              @csrf
          </form>
          
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>