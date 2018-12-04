---
pagination:
    collection: posts
    perPage: 10
---
@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->siteName }} Blog" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="The list of blog posts for {{ $page->siteName }}" />
@endpush

@section('body')
    <p class="mb-4">{{ $page->siteDescription }}</p>

    <hr class="border-b mb-4">

    @foreach ($pagination->items as $post)
        @include('_components.post-preview-inline')

        <hr class="-mt-1 mb-2 border-b border-grey-light">
    @endforeach

    @if($pagination->pages->count() > 1)
        <div class="flex my-8 text-base">
            @if ($previous = $pagination->previous)
                <a href="{{ $page->url($previous) }}" title="Previous Page"
                    class="bg-grey-lighter hover:bg-grey-light mr-3 px-5 py-3 rounded">&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a href="{{ $page->url($path) }}" title="Go to Page {{ $pageNumber }}"
                    class="bg-grey-lighter hover:bg-grey-light mr-3 px-5 py-3 text-grey-darker hover:text-blue-dark rounded {{ $pagination->currentPage == $pageNumber ? 'text-blue-dark' : '' }}">
                    {{ $pageNumber }}
                </a>
            @endforeach

            @if ($next = $pagination->next)
                <a href="{{ $page->url($next) }}" title="Next Page"
                    class="bg-grey-lighter hover:bg-grey-light mr-3 px-5 py-3 rounded">&RightArrow;</a>
            @endif
        </div>
    @endif
@stop
