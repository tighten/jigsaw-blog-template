<nav class="hidden lg:flex w-1/3 justify-end text-base font-semibold lg:justify-around">
    <a title="{{ $page->siteName }} Home" href="/"
        class="mr-6 text-grey hover:text-blue-darkest lg:mr-0" >Home</a>

    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="mr-6 text-grey hover:text-blue-darkest lg:mr-0 {{ $page->isActive('/blog') ? 'active text-blue' : '' }}">
        Blog
    </a>

    <a title="{{ $page->siteName }} About" href="/about"
        class="mr-6 text-grey hover:text-blue-darkest lg:mr-0 {{ $page->isActive('/about') ? 'active text-blue' : '' }}">
        About
    </a>

    <a title="{{ $page->siteName }} Contact" href="/contact"
        class="text-grey hover:text-blue-darkest {{ $page->isActive('/contact') ? 'active text-blue' : '' }}">
        Contact
    </a>
</nav>
