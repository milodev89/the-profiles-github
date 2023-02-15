<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        @vite('resources/sass/app.scss')
    </head>
    <body class="">
        @include('layouts.nav')
        
        <div id="app" class="container"></div>

        @include('layouts.footer')

        @vite('resources/js/profile.js')
    </body>
</html>