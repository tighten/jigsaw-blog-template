---
pagination:
    collection: posts
    perPage: 10
---
@extends('_layouts.master')

@section('body')
<div class="md:flex -mx-4">
    <div class="mb-8 lg:mb-0 px-4 md:w-3/4">
        <h1 class="page-title">Blog</h1>
        @foreach ($pagination->items as $post)
            @include('_partials.post-preview-inline')
        @endforeach

        @if ($previous = $pagination->previous)
            <a href="{{ $page->url($pagination->first) }}">&lt;&lt;</a>
            <a href="{{ $page->url($previous) }}" class="mr-1">&lt;</a>
        @else
            <span class="text-grey mr-1">&lt;&lt; &lt;</span>
        @endif

        @foreach ($pagination->pages as $pageNumber => $path)
            <a href="{{ $page->url($path) }}"
                class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">{{ $pageNumber }}</a>&nbsp;
        @endforeach

        @if ($next = $pagination->next)
            <a href="{{ $page->url($next) }}">&gt;</a>
            <a href="{{ $page->url($pagination->last) }}">&gt;&gt;</a>
        @else
            <span class="text-grey">&gt; &gt;&gt;</span>
        @endif
    </div>
    <div class="px-4 md:w-1/4">
        <div class="flex items-center md:block text-center">
            <!-- Side bar stuff -->
        </div>
    </div>
</div>
@endsection
