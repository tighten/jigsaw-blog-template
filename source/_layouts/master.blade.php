<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $page->title }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Temporary-->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        @include('_components.header')

        <div class="container mx-auto px-4">
            @yield('body')
        </div>

        @include('_components.footer')
    </body>
</html>
