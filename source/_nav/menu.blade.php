<nav class="hidden lg:flex w-1/3 justify-end lg:justify-around text-base font-semibold">
    <a title="{{ $page->siteName }} Home" href="/"
        class="mr-6 text-grey-darker hover:text-blue lg:mr-0">
        Home
    </a>

    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="mr-6 text-grey-darker hover:text-blue lg:mr-0 {{ $page->isActive('/blog') ? 'active text-blue' : '' }}">
        Blog
    </a>

    <a title="{{ $page->siteName }} About" href="/about"
        class="mr-6 text-grey-darker hover:text-blue lg:mr-0 {{ $page->isActive('/about') ? 'active text-blue' : '' }}">
        About
    </a>

    <a title="{{ $page->siteName }} Contact" href="/contact"
        class="text-grey-darker hover:text-blue {{ $page->isActive('/contact') ? 'active text-blue' : '' }}">
        Contact
    </a>
</nav>
