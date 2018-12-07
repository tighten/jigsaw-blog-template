<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="ml-6 text-grey-darker hover:text-blue {{ $page->isActive('/blog') ? 'active text-blue' : '' }}">
        Blog
    </a>

    <a title="{{ $page->siteName }} About" href="/about"
        class="ml-6 text-grey-darker hover:text-blue {{ $page->isActive('/about') ? 'active text-blue' : '' }}">
        About
    </a>

    <a title="{{ $page->siteName }} Contact" href="/contact"
        class="ml-6 text-grey-darker hover:text-blue {{ $page->isActive('/contact') ? 'active text-blue' : '' }}">
        Contact
    </a>
</nav>
