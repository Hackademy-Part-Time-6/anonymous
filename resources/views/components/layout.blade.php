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
    <x-nav/>
    {{ $slot }}
    <x-footer/>
    
    @vite(['resources/js/app.js'])
    @livewireScripts
    {{ $script ?? '' }}

</body>
</html>
