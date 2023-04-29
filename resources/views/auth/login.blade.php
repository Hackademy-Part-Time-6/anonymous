<x-layout>

    <x-slot name="title">Anonymous - Login</x-slot>

    {{-- Form Login --}}
    <div class="container-fluid mt-2 ">
        <div class="row p-5 ">
            <div class="col-12 col-md-6 offset-md-3 ">
                {{-- Form Title --}}

                <h2 class="form-title space-around">Iniciar Sesiòn</h2>

                @isset($error)
                @if ($error->any())
                    
                <div class="alert alert-danger">
                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach

                    </ul>
                </div>
            
            @endif
                @endisset

                {{-- Form Fields --}}

                <form action="/login" method="POST" role="form" class="form-control bg-secondary text-white">
                    @csrf

                    {{-- Email --}}

                    <div class="space-around my-3 ">
                        <input type="email"  name="email" class="form-control forms_field-input " id="email" placeholder="Tu correo" data-rule="minlen:4" data-msg="Por favor cuatros carateres" />
                        <div class="validate"></div>
                    </div>

                        {{-- Password --}}
 
                        <div class="space-around my-3">

                            <input type="password" name="password" class="form-control forms_field-input" id="password" placeholder="Contraseña" data-rule="minlen:4" data-msg="Por favor cuatros carateres" />

                            <div class="validate"></div>

                        </div>

                        {{-- Button Login --}}

                        <button type="submit" class="btn bg-warning">Entrar</button>


                </form>

                <p class="my-3">
                    ¿Aun no eres de los nuestros?
                    <a href="{{route("register")}}" class="btn ntn-info btn-sm ms-2">
                       <b>¡Registrate!</b>
                    </a>
                </p>

            </div>

        </div>



    </div>

</x-layout>