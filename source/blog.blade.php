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
    @include('_partials.post-preview-inline')
@endforeach

<div class="flex justify-center">
    @if ($previous = $pagination->previous)
        <a href="{{ $page->url($pagination->first) }}">&lt;&lt;</a>
        <a href="{{ $page->url($previous) }}" class="mr-2">&lt;</a>
    @else
        <span class="text-grey mr-2">&lt;&lt; &lt;</span>
    @endif

    @foreach ($pagination->pages as $pageNumber => $path)
        <a href="{{ $page->url($path) }}"
            class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">{{ $pageNumber }}</a>&nbsp;
    @endforeach

    @if ($next = $pagination->next)
        <a href="{{ $page->url($next) }}" class="ml-2">&gt;</a>
        @if($next !== $pagination->last)
            <a href="{{ $page->url($pagination->last) }}" class="ml-2">&gt;&gt;</a>
        @endif
    @else
        <span class="ml-2 text-grey">&gt; &gt;&gt;</span>
    @endif
</div>
@endsection
