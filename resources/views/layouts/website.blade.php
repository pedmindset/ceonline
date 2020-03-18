<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('partials.website.styles')
        


        <title>@yield('title') {{ config('app.name', 'CE ONLINE') }}</title>
    </head>
    <body>
        <div>
         @include('partials.website.nav')
         @include('partials.website.header')
          <main>
            @stack('page-content')
          </main>
          @include('partials.website.footer')
        </div>
        @include('partials.website.scripts')

    </body>
</html>
