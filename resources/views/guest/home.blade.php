<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        {{-- Collegamento al foglio di stile --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
    </head>
    <body>
        {{-- Inseriamo un <div> #root dove andra' inserito Vue --}}
        <div id="root"></div>
       
        {{-- Collegamento al foglio JS --}}
        <script src='{{ asset('js/front.js')}}'></script>
    </body>
</html>
