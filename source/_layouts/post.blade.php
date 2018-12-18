@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="mb-2">
    @endif

    <h1 class="leading-none mb-2">{{ $page->title }}</h1>

    <p class="text-grey-darker text-xl md:mt-0">{{ $page->author }}  •  {{ date('F j, Y', $page->date) }}</p>

    @if ($page->categories)
        @foreach ($page->categories as $i => $category)
            <a
                href="{{ $page->url('/blog/categories/' . $category) }}"
                title="View posts in {{ $category }}"
                class="inline-block bg-grey-light hover:bg-blue-lighter leading-loose tracking-wide text-grey-darkest uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
            >{{ $category }}</a>
        @endforeach
    @endif

    <div class="border-b border-blue-lighter mb-10 pb-4" v-pre>
        @yield('content')
    </div>

    <nav class="clearfix">
        @if ($next = $page->getNext())
            <a href="{{ $page->url($next->getPath()) }}" title="Next Post: {{ $next->title }}" class="float-left text-sm md:text-base">
                &LeftArrow; {{ $next->title }}
            </a>
        @endif

        @if ($previous = $page->getPrevious())
            <a href="{{ $page->url($previous->getPath()) }}" title="Previous Post: {{ $previous->title }}"class="float-right text-sm md:text-base">
                {{ $previous->title }} &RightArrow;
            </a>
        @endif
    </nav>
@endsection
