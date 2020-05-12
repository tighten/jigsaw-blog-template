<?php echo "<?xml version=\"1.0\"?>\n"; ?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>{{ $page->siteName }}</title>
    <link href="{{ rightTrimPath($page->baseUrl) }}/{{ $page->site_path }}" />
    <link type="application/atom+xml" rel="self" href="{{ $page->getUrl() }}" />
    <updated>{{ date(DATE_ATOM) }}</updated>
    <id>{{ $page->getUrl() }}</id>
    <author>
        <name>{{ $page->siteAuthor }}</name>
    </author>
    @yield('entries')
</feed>
