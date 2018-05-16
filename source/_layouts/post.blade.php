@extends('_layouts.master')

@section('body')
    <h1 class="page-title">{{ $page->title }}</h1>
    <p class="mb-6 text-grey-darker">By {{ $page->author }} • {{ date('F j, Y', $page->date) }}</p>

    @yield('content')

    <hr class="border mt-8">

    @if ($page->getPrevious())
        <p>Read my previous post:
            <a href="{{ $page->getPrevious()->getPath() }}">{{ $page->getPrevious()->title }}</a>
        </p>
    @endif

    @if ($page->getNext())
        <p>Read my next post:
            <a href="{{ $page->getNext()->getPath() }}">{{ $page->getNext()->title }}</a>
        </p>
    @endif
@endsection
