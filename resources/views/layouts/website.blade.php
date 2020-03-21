<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @include('partials.website.styles')
        
        <script src="{{ asset('js/app.js') }}" ></script>


        <title>@yield('title') {{ config('app.name', 'CE ONLINE') }}</title>
    </head>
    <body>
        <div id="myapp">
         @include('partials.website.nav')
         @include('partials.website.header')
          <main>
            @stack('page-content')
          </main>
          @include('partials.website.footer')
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @include('partials.website.scripts')

    </body>
</html>
