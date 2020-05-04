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
    <style>
table, th, td {
  border: 1px solid black;
}
</style>
    </head>
    <body>
    <div id="app">
        <!-- <example></example> -->
   </div>

   {{ asset('/') }}
   <script>
       function curry(func) {

        // return function curried(...args) {
        //   if (args.length >= func.length) {
        //     return func.apply(this, args);
        //   } else {
        //     return function(...args2) {
        //       return curried.apply(this, args.concat(args2));
        //     }
        //   }
        // };

    console.log(func.length);

    }

    curry((asdf, asd2) => 23)

    
   </script>
    
    </body>
</html>
