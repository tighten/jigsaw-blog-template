<a title="{{ $page->siteName }} Home" href="/"
    class="mr-6 text-grey hover:text-blue-darkest lg:mr-0" >Home</a>

<a title="{{ $page->siteName }} Blog"
    href="/blog"
    class="mr-6 text-grey hover:text-blue-darkest lg:mr-0"
    :class="{ 'text-blue-darkest' : urlIsActive('/blog') }">
    Blog
</a>

<a title="{{ $page->siteName }} About"
    href="/about"
    class="mr-6 text-grey hover:text-blue-darkest lg:mr-0"
    :class="{ 'text-blue-darkest' : urlIsActive('/about') }">
    About
</a>

<a title="{{ $page->siteName }} Contact"
    href="/contact"
    class="text-grey hover:text-blue-darkest"
    :class="{ 'text-blue-darkest' : urlIsActive('/contact') }">
    Contact
</a>
