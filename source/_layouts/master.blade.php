<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $page->blogTitle }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="stylesheet" href="{{ mix('css/main.css') }}">
    </head>
    <body>
        @include('_components.header')

        <div class="container mx-auto px-4">
            @yield('body')
        </div>

        @include('_components.footer')
    </body>
</html>
