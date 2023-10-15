<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logueo con {{$user->social_type}}</title>
</head>
<body>
<h1>Hola: {{$user->name}}</h1>
<h3>Gracias por acceder a {{ config('app.name') }} con tu cuenta de {{$user->social_type}}.</h3>
<h4>Si no has sido tu, cambia tu contraseña de {{$user->social_type}} inmediatamente.</h4>
</body>
</html>
