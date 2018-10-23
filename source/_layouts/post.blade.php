@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    <h1 class="mb-0">{{ $page->title }}</h1>

    <p class="text-grey font-semibold text-lg mb-4">{{ $page->author }} • {{ date('F j, Y', $page->date) }}</p>

    @if ($page->categories)
        @foreach ($page->categories as $i => $category)
            <a href="{{ $page->url('/blog/categories/' . $category) }}"
                title="View posts in {{ $category }}"
                class="bg-grey-lighter border text-blue-darker uppercase text-xs font-semibold mr-4 px-4 py-2 rounded-lg">
                {{ $category }}
            </a>
        @endforeach
    @endif

    <div class="mb-8 py-8 border-b" v-pre>
        @yield('content')
    </div>

    @if ($page->getPrevious())
        <p>Read my previous post:
            <a href="{{ $page->url($page->getPrevious()->getPath()) }}">{{ $page->getPrevious()->title }}</a>
        </p>
    @endif

    @if ($page->getNext())
        <p>Read my next post:
            <a href="{{ $page->url($page->getNext()->getPath()) }}">{{ $page->getNext()->title }}</a>
        </p>
    @endif
@endsection
