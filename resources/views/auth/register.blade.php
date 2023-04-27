<x-layout>
<x-slot name="title">Anonymous - Register </x-slot>

<!-- ==== register ==== -->

<div class="container-fluid bg-accent vh100">
    <div class="row mb-5 pb-5">
        <div class="col-12 col-md-8 ms-5">
            <div class="d-flex flex column-align-items-center">
                <div class="form-content justify-content-center mb-5 pb5">
                    <!-- FORM TITLE -->
                    <div class="section-title">
                        <h2 class="form-title space-around">Crear Cuenta 
                            <!-- <span>Anonymous</span> -->
                        </h2>
                        <!--<p> ut possimus qui ut temporibus culpa velit autem</p> -->
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>                                
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- form fields -->
                    <form action="/register" mathod="post" role= "form" class="php-email-form">
                    @csrf
                    <!-- name -->
                    <div class="form-field-edit form-field space-around my-2">
                        <input type="text" name="name" id="name" class="form-control forms_field-input" placeholder="nombre">
                        <div class="validate"></div>
                    </div>
                        <!-- email -->
                        <div class="form-field-edit form-field space-around my-2">
                            <input type="email" name="email" id="pasword" class="form-control forms_field-input" placeholder="Email">
                            <div class="validate"></div>
                        </div>
                        <!-- mpasword -->
                        <div class="form-field-edit form-field space-around my-2">
                            <input type="password" name="password" class="form-control forms_field-input" placeholder="Tu contraseña">
                            <div class="validate"></div>
                        </div>
                        <div class="form-field-edit form-field space-around my-2">
                            <input type="password" name="password_confirmation" id="pasword" class="form-control forms_field-input" placeholder="Tu contraseña, una vez mas">
                            <div class="validate"></div>
                        </div>
                        <!-- boton de registro -->
                        <button type="submit" class="form-button-edit text-center space-around my2">
                            Crear Cuenta
                        </button>
                    </form>
                </div>
                <div class="form-link mt-4 d-flex">
                    <p class="text-white">¿ya eres de los nuestros?</p>
                    <a href="{{ route('login') }}" class="text-reset text-decoration-none ps-2"> <u>¡entra ya!</u></a>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout> 