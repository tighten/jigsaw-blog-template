@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    <h1 class="mb-2 leading-none">{{ $page->title }}</h1>

    <p class="mb-6 mt-2 text-grey font-semibold text-lg">{{ $page->author }}  •  {{ date('F j, Y', $page->date) }}</p>

    @if ($page->categories)
        @foreach ($page->categories as $i => $category)
            <a href="{{ $page->url('/blog/categories/' . $category) }}"
                title="View posts in {{ $category }}"
                class="bg-grey-lighter border border-grey-light tracking-wide text-blue-darker uppercase text-xs font-semibold mr-4 px-3 py-1 rounded-lg">
                {{ $category }}
            </a>
        @endforeach
    @endif

    <div class="mb-8 py-8 border-b" v-pre>
        @yield('content')
    </div>

    <div class="flex {{ $page->getPrevious() ? 'justify-between' : 'justify-end' }}">
        @if ($page->getPrevious())
            <a href="{{ $page->url($page->getPrevious()->getPath()) }}"
                title="{{ $page->getPrevious()->title }}">Previous Post</a>
        @endif

        @if ($page->getNext())
            <a href="{{ $page->url($page->getNext()->getPath()) }}"
                title="{{ $page->getNext()->title }}">Next Post</a>
        @endif
    </div>
@endsection
