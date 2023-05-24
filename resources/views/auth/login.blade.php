<x-layout>

    <x-slot name="title">Anonymous - Login</x-slot>

    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-12 col-md-6">
                {{-- Image --}}
                <div class="text-center my-1">
                    <img src="{{ asset('./image/login.gif') }}" alt="">
                </div>

            </div>
            <div class="col-12 col-md-6 my-5">
                <div class="text-center ">
                    {{-- Form Title --}}
                    <h2 class="form-title space-around">{{ __('Iniciar sesión') }}</h2>

                    @isset($error)
                        @if ($error->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endisset

                    {{-- Form Fields --}}
                    <form action="/login" method="POST" role="form" class="form-control ref3 text-white">
                        @csrf

                        {{-- Email --}}
                        <div class="space-around my-3">
                            <input type="email" name="email" class="form-control forms_field-input" id="email"
                                placeholder="{{ __('Tu correo') }}" data-rule="minlen:4"
                                data-msg="Por favor cuatros carateres" />
                            <div class="validate"></div>
                        </div>

                        {{-- Password --}}
                        <div class="space-around my-3">
                            <input type="password" name="password" class="form-control forms_field-input" id="password"
                                placeholder="{{ __('Tu contraseña') }}" data-rule="minlen:4"
                                data-msg="Por favor cuatros carateres" />
                            <div class="validate"></div>
                        </div>

                        {{-- Button Login --}}
                        <button type="submit" class="btn bg-warning">{{ __('Aceptar') }}</button>
                    </form>

                    {{-- Additional Text --}}
                    <p class="my-3">
                        {{ __('¿Ya eres de los nuestros?') }}
                        <a href="{{ route('register') }}" class="btn ntn-info btn-sm ms-2">
                            <b><button type="button" class="btn btn-outline-dark">{{ __('¡Registrate!') }}</button>
                            </b>
                        </a>
                    </p>
                </div>
            </div>
        </div>

    </div>

</x-layout>
