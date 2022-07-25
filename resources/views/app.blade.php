<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title inertia>{{ config('app.name', 'Laravel') }}</title>

  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Scripts -->
  @routes
  @vite('resources/js/app.js')
  @inertiaHead
</head>

<body class="font-sans antialiased">
  @inertia
</body>

</html>
