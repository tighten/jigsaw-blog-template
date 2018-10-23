<header class="bg-white border-b mb-8 py-4 flex shadow-lg" role="banner">
    <div class="container max-w-2xl flex mx-auto px-6">
        <div class="flex items-center">
            <a href="{{ $page->url('/') }}" title="{{ $page->siteName }} home" class="inline-flex items-center mr-3 font-bold">
                <img class="h-8 md:h-10" src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" />
            </a>
            <h3 class="font-thin hidden sm:block"><a href="/" title="Home" class="text-blue-darker">{{ $page->siteName }}</a></h3>
        </div>

        <div class="flex flex-1 align-right justify-end items-center">
            <nav class="flex w-1/2 justify-end text-base font-semibold">
                <a class="mr-4 text-grey text-blue-darkest" href="/">Home</a>
                <a class="mr-4 text-grey" href="/blog">Blog</a>
                <a class="mr-4 text-grey" href="/about">About</a>
                <a class="text-grey" href="/contact">Contact</a>
            </nav>
        </div>
    </div>
</header>
