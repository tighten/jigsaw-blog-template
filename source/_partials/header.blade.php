<header class="bg-white border-b mb-8 py-4 flex shadow-lg" role="banner">
    <div class="container max-w-4xl flex mx-auto px-6">
        <div class="flex items-center">
            <a href="{{ $page->url('/') }}" title="{{ $page->siteName }} home" class="inline-flex items-center mr-3 font-bold">
                <img class="h-8 md:h-10" src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" />
            </a>
            <h1 class="font-normal text-xl hidden sm:block"><a href="/" title="Home" class="text-blue-darker">{{ $page->siteName }}</a></h1>
        </div>

        <div class="flex flex-1 align-right justify-end items-center">
            <nav class="flex w-1/2 justify-end text-base font-semibold">
                <a title="{{ $page->siteName }} Home" href="/"
                    class="mr-4 text-grey hover:text-blue-darkest" >Home</a>

                <a title="{{ $page->siteName }} Blog"
                    href="/blog"
                    class="mr-4 text-grey hover:text-blue-darkest"
                    :class="{ 'text-blue-darkest' : urlIsActive('/blog') }">
                    Blog
                </a>

                <a title="{{ $page->siteName }} About"
                    href="/about"
                    class="mr-4 text-grey hover:text-blue-darkest"
                    :class="{ 'text-blue-darkest' : urlIsActive('/about') }">
                    About
                </a>

                <a title="{{ $page->siteName }} Contact"
                    href="/contact"
                    class="text-grey hover:text-blue-darkest"
                    :class="{ 'text-blue-darkest' : urlIsActive('/contact') }">
                    Contact
                </a>
            </nav>
        </div>
    </div>
</header>
