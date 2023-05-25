<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anonymous - Solicitud De Revisor</title>
</head>
<body>
    <div>
        <h1>Un usuario quiere trabajar con nosotros</h1>
        <h2>A continuación sus datos:</h2>
        <p><b>Nombre:</b> {{$user->name}}</p>
        <p><b>Email:</b> {{$user->email}}</p>
        <p>Si quieres que haga parte de nuestro equipo pulse aquí</p>
        <a href="{{route('revisor.make',$user)}}">Acepta Solicitud</a>
    </div>
</body>
</html>