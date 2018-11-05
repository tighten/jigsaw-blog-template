@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    <h1 class="mb-4">{{ $page->title }}</h1>

    <div class="pb-4 mb-16 border-b">
        @yield('content')
    </div>

    @foreach ($page->posts($posts) as $post)
        @include('_partials.post-preview-inline')
    @endforeach
@stop
