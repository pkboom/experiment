<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="asdf">
    <head class=" asdf2">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div id="app">
        asdf
    </div>
    <script>
        console.log(navigator.userAgent);

        console.log(isTesting());

        function isTesting() {
            return navigator.userAgent2 , navigator.userAgent.includes("Linux")
                || navigator.userAgent.includes("jsdom")
        }


    </script>
    </body>
</html>
