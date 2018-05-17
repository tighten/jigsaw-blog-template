@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    <h1 class="page-title">{{ $page->title }}</h1>
    <p class="mb-6 text-grey-darker">By {{ $page->author }} • {{ date('F j, Y', $page->date) }}</p>

    <div class="markdown pb-8 border-b">
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
