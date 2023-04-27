<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">ANONYMOUS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Quienes somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Donde estamos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>


              {{-- Acciones para registrarse --}}


              @guest
               
                @if(Route::has('login'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{route("login")}}">
                      <span>
                        Entrar
                      </span>
                    </a>
                  </li>
                @endif

                @if(Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{route("register")}}">
                    <span>
                      Registrar
                    </span>
                  </a>
                </li>
              @endif


                @else

                <li class="nav-item">
                  <form action="{{route("logout")}}" id="logoutForm" method="POST">
                    @csrf
                  </form>
                  <a href="#" id="logoutBtn" class="nav-link">Salir</a>
                </li>

              @endguest

            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>