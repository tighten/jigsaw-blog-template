@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->blogDescription }}" />
@endpush

@section('body')
    @foreach ($featuredPosts = $posts->where('featured', true) as $featuredPost)
        <div class="w-full mb-6">
            @if ($featuredPost->cover_image)
                <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }} cover image">
            @endif

            <h2 class="text-3xl">
                <a href="{{ $page->url($featuredPost->getPath()) }}" title="Read {{ $featuredPost->title }}" class="text-black font-extrabold">
                    {{ $featuredPost->title }}
                </a>
            </h2>

            <p class="mt-0 mb-4">{!! $featuredPost->excerpt() !!}</p>

            <a href="{{ $page->url($featuredPost->getPath()) }}" title="Read - {{ $featuredPost->title }}"
                class="mb-4 text-blue uppercase font-semibold tracking-wide">Read</a>
        </div>

        @if ($featuredPost != $featuredPosts->last())
            <hr class="border-b my-6">
        @endif
    @endforeach

    @include('_components.newsletter-signup')
@stop
