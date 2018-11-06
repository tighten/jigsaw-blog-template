<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->meta_description or $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->siteName }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->siteDescription }}" />

        <title>{{ $page->siteName }} | {{ $page->title }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="{{ $page->url('favicon.ico') }}">
        <link href="{{ $page->url('blog/feed.atom') }}" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link rel="stylesheet" href="{{ $page->url(mix('css/main.css')) }}">
    </head>
    <body class="bg-grey-lightest text-grey-darker leading-normal text-lg font-sans font-normal">
        <div id="vue-app">
            <header class="bg-white border-b py-4 flex shadow-lg" role="banner">
                <div class="container max-w-4xl flex mx-auto px-6 py-2">
                    <div class="flex items-center">
                        <a href="{{ $page->url('/') }}" title="{{ $page->siteName }} home" class="inline-flex items-center mr-3 font-bold">
                            <img class="h-8" src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" />
                        </a>
                        <h1 class="my-0 font-normal text-xl"><a href="/" title="Home" class="text-blue-darker">{{ $page->siteName }}</a></h1>
                    </div>

                    <div class="flex flex-1 justify-end items-center">
                        <nav class="hidden md:flex w-1/3 justify-end text-base font-semibold lg:justify-around">
                            @include('_partials.navigation-links')
                        </nav>

                        <navigation-toggle></navigation-toggle>
                    </div>
                </div>
            </header>

            <nav class="hidden md:hidden flex-col bg-grey-lighter p-6" :class="{ flex:  displayMobileNav }">
                @include('_partials.navigation-links')
            </nav>

            <main role="main" class="w-full min-h-screen max-w-xl container mx-auto pt-8 px-6">
                @yield('body')
            </main>
        </div>

        <script src="{{ $page->url(mix('js/main.js')) }}"></script>
        <footer class="bg-white text-center py-4 mt-12" role="contentinfo">
            <p class="text-sm">
                &copy; <a href="https://tighten.co" title="Tighten website">Tighten</a> {{ date('Y') }}.
                Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
            </p>
        </footer>
    </body>
</html>
