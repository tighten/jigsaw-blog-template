<div class="bg-grey-lighter mb-8">
    <header class="container mx-auto px-4">
        <div class="sm:flex">
            <a href="{{ $page->url('/') }}" class="inline-flex items-center w-full pt-4 pb-2 sm:py-6 w-full font-bold">
                @include('_components.logo')
                <span class="pl-4">
                    {{ $page->blogTitle }}
                </span>
            </a>

            <nav class="sm:flex sm:flex-wrap sm:justify-end lg:w-full">
                <a href="{{ $page->url('/') }}" class="lg:flex items-center p-2 sm:p-4 hidden">
                    Home
                </a>
                <a href="{{ $page->url('/blog') }}" class="flex items-center p-2 sm:p-4">
                    Blog
                </a>
                <a href="{{ $page->url('/about') }}" class="flex items-center p-2 sm:p-4">
                    About
                </a>
                <a href="{{ $page->url('/contact') }}" class="flex items-center p-2 sm:p-4">
                    Contact
                </a>

                <form action="https://google.com/search" method="get" class="flex items-center px-2">
                    <fieldset role="search">
                        <input type="hidden" name="sitesearch" value="{{ $page->searchDomain }}">
                        <input type="text" name="q" results="0" placeholder="Search" class="p-1 border border-grey-dark my-4 sm:mt-0 lg:mb-0">
                    </fieldset>
                </form>
            </nav>
        </div>
    </header>
</div>
