<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;600&display=swap" rel="stylesheet">
    <title>Laravel</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>

<body>
    {{ $users->links() }}
</body>

</html>
