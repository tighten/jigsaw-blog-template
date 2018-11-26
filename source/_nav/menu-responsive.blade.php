<nav id="js-nav-menu" class="nav-menu hidden text-lg">
    <ul class="list-reset pl-4">
        <li>
            <a title="{{ $page->siteName }} Home" href="/"
                class="nav-menu__item hover:text-blue {{ $page->isActive('/') ? 'active text-blue' : '' }}">
                Home
            </a>
        </li>
        <li>
            <a title="{{ $page->siteName }} Blog" href="/blog"
                class="nav-menu__item hover:text-blue {{ $page->isActive('/blog') ? 'active text-blue' : '' }}">
                Blog
            </a>
        </li>
        <li>
            <a title="{{ $page->siteName }} About" href="/about"
                class="nav-menu__item hover:text-blue {{ $page->isActive('/about') ? 'active text-blue' : '' }}">
                About
            </a>
        </li>
        <li>
            <a title="{{ $page->siteName }} Contact" href="/contact"
                class="nav-menu__item hover:text-blue {{ $page->isActive('/contact') ? 'active text-blue' : '' }}">
                Contact
            </a>
        </li>
    </ul>
</nav>
