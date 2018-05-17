@extends('_layouts.master')

@section('body')
    <h1 class="page-title">{{ $page->title }}</h1>
    <p class="mb-6 text-grey-darker">By {{ $page->author }} • {{ date('F j, Y', $page->date) }}</p>

    <div class="markdown">
        @yield('content')
    </div>

    <hr class="border mt-8">

    @if ($page->getPrevious())
        <p>Read my previous post:
            <a href="{{ $page->baseUrl }}{{ $page->getPrevious()->getPath() }}">{{ $page->getPrevious()->title }}</a>
        </p>
    @endif

    @if ($page->getNext())
        <p>Read my next post:
            <a href="{{ $page->baseUrl }}{{ $page->getNext()->getPath() }}">{{ $page->getNext()->title }}</a>
        </p>
    @endif
@endsection
