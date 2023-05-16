<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('./image/logo.png')}}" type="image/x-icon">

    @vite(['resources/css/app.css','resources/css/iconos.css','resources/css/admin.css'])
    {{-- @vite(['resources/css/iconos.css'])
    @vite(['resources/css/admin.css']) --}}
    
    <title>@yield('title')</title>

</head>
<body>
        <!-- Container de La Cuadricula -->
    <div class="container__panel">

            {{-- Barra Principal --}}
                <x-header />
            {{-- Barra Principal Fin --}}>

            {{--Barra Lateral   --}}

            <x-aside />

            {{--Barra Lateral Fin  --}}

            <!-- Contenido Principal  -->
            <main class="main__content">

                @if (session()->has('message'))
                    <x-message :message="session('message')['text']" :color="session('message')['type']"></x-message>
                @endif

                @yield('content')
            </main>
        <!-- Contenido Principal Fin  -->
          
    </div>
          <!-- Contenido Principal Fin  -->

          @vite(['resources/js/app.js','resources/js/index.js'])
          {{-- @vite(['resources/js/index.js']) --}}

</body>
</html>