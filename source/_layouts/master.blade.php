<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ $page->title ? "{$page->title} | " : "" }}{{ $page->blogTitle }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link href="{{ $page->url('blog/feed.atom') }}" type="application/atom+xml" rel="alternate" title="{{ $page->blogTitle }} Atom Feed">
        <link rel="icon" href="{{ $page->url('favicon.ico') }}">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link rel="stylesheet" href="{{ $page->url(mix('css/main.css')) }}">
    </head>
    <body>
        <div id="vue-app">
            @include('_partials.header')

            <div class="container mx-auto px-4 pb-8 content">
                <div class="mx-auto w-full lg:w-3/4">
                    @yield('body')
                </div>
            </div>
        </div>

        <script src="{{ $page->url(mix('js/main.js')) }}"></script>
        @include('_partials.footer')
    </body>
</html>
