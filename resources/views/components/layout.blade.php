<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Anonymous' }}</title>
    <!-- iconos boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @livewireStyles
    @vite(['resources/css/app.css'])
   

    {{ $style ?? '' }}
</head>
<body>

    @auth
    <x-floating-button icon="bi bi-plus-square"></x-floating-button>
    @endauth

    {{-- <div class="container">
        <div class="circle-menu">
          <button class="round-button"></button>
          <div class="options"></i>Editar</a>
            <a href="#"><i class="far fa-edit"></i></a>
            <a href="#"><i class="far fa-plus-square"></i></a>
            <a href="#"><i class="far fa-sync"></i></a>
          </div>
        </div>
      </div> --}}
      

    <x-nav/>


    @if (!is_null(session('message')))
        <x-message :message="session('message')['text']" color="error"/>
    @endif


    {{ $slot }}
    <x-footer/>
    
    @vite(['resources/js/app.js'])
    @livewireScripts
    {{ $script ?? '' }}

</body>
</html>
