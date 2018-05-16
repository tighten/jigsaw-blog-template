<header class="container mx-auto px-4 border-b border-grey mb-8">
    <div class="sm:flex">
        <div class="flex items-center w-full sm:w-1/3 lg:w-1/4">
            <a href="/" class="py-6 w-3/4 font-bold">
                {{ $page->blogTitle }}
            </a>
        </div>

        <nav class="sm:flex sm:flex-wrap sm:justify-end md:w-2/3 lg:w-3/4 w-full">
            <a href="/" class="flex items-center p-4">
                About
            </a>
            <a href="/blog" class="flex items-center p-4">
                Blog
            </a>
            <a href="/contact" class="flex items-center p-4">
                Contact
            </a>
        </nav>
    </div>
</header>
