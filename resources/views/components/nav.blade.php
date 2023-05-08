<nav class="navbar navbar-expand-lg ref1">
    <div class="container-fluid ">
        <a href="{{ route('home') }}">
            <img src="{{ asset('./image/logo.png') }}" alt="Logo Anonymous" width="50%" height="24%">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Dónde estamos') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Quienes somos') }}</a>
                </li>
                <!--Visualizar las categorías en la navbar da error-->
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle item_nav" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('Categorías') }}
                    </a>
                    <ul class="dropdown-menu ref4" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item ref4"
                                    href="{{ route('category.ads', $category) }}">{{ __($category->name) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    @if (auth()->check())
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu ref4" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="dropdown-item ref4" href="{{ route('revisor.home') }}">
                                        {{ __('Revisor') }}
                                        <span class="badge rounded-pill bg-danger">
                                            {{ \App\Models\Ad::ToBeRevisionedCount() }}
                                        </span>
                                        @if (is_string(\App\Models\Ad::ToBeRevisionedCount()))
                                            <div> {{ \App\Models\Ad::ToBeRevisionedCount() }} </div>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            <li>
                                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                                <a id="logoutBtn" class="dropdown-item ref4" href="#">{{ __('Salir') }}</a>
                            </li>
                        </ul>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                    @endif
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Registrar') }}
                    </a>
                    <ul class="dropdown-menu ref4" aria-labelledby="navbarDropdownMenuLink">



                        {{-- Acciones para registrarse --}}


                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <span>
                                            {{ __('Entrar') }}
                                        </span>
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <span>
                                            {{ __('Registrar') }}
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item ref4">
                                <form action="{{ route('logout') }}" id="logoutForm" method="POST">
                                    @csrf
                                </form>
                                <a href="#" id="logoutBtn" class="nav-link">{{ __('Salir') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ads.create') }}">
                                    <span>
                                        {{ __('Crear Anuncio') }}
                                    </span>
                                </a>
                            </li>
                        @endguest

                    </ul>
                </li>

                <li class="nav-item">
                    <x-locale lang="es" country="es" />
                </li>

                <li class="nav-item">
                    <x-locale lang="en" country="gb" />
                </li>

                <li class="nav-item">
                    <x-locale lang="it" country="it" />
                </li>


            </ul>
        </div>
    </div>
</nav>
