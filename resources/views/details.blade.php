<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de usuario - Styde.net</title>
</head>
<body>
<h1>{{ $title }}</h1>

<hr>

<ul>
    @forelse ($user as $key => $value)
        <li><strong>{{ $key }}:</strong> {{ $value }}</li>
    @empty
        <li>No existe el usuario</li>
    @endforelse
</ul>
</body>
</html>
