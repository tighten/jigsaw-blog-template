<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ $page->title ? "{$page->title} | " : "" }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link href="{{ $page->url('blog/feed.atom') }}" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">
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

            <div class="container mx-auto px-4 pb-8 content min-h-screen">
                <div class="mx-auto w-full lg:w-3/4">
                    @yield('body')
                </div>
            </div>
        </div>

        <script src="{{ $page->url(mix('js/main.js')) }}"></script>
        <footer class="bg-white text-center py-4 mt-12" role="contentinfo">
            <p class="text-sm">&copy; {{ $page->copyrightHolder}} {{ date('Y') }}. Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a> and <a href="https://tailwindcss.com" title="Tailwindcss a utility-first css framework">Tailwind CSS</a>.</p>
        </footer>
    </body>
</html>
