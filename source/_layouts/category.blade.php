@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    <h1>{{ $page->title }}</h1>

    <div class="markdown pb-8">
        @yield('content')
    </div>

    <p>Posts in this category:</p>
    <ul>
    @foreach ($page->posts($posts) as $post)
        <li><a href="{{ $page->url($post->getPath()) }}">{{ $post->title }}</a></li>
    @endforeach
    </ul>
@endsection
