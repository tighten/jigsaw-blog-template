@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->blogDescription }}" />
@endpush

@section('body')
@if($featuredPost = $posts->where('featured')->first())
    <div class="w-full pb-8 mb-4 border-b">
        @if($featuredPost->coverImage())
            <img src="{{ $featuredPost->coverImage() }}" alt="{{ $featuredPost->title }} cover image">
        @endif

        <h2 class="text-3xl">
            <a href="{{ $page->url($featuredPost->getPath()) }}" title="Read {{ $featuredPost->title }}" class="text-black font-extrabold">
                {{ $featuredPost->title }}
            </a>
        </h2>

        <p class="mt-0 mb-4 text-xl font-light">{!! $featuredPost->excerpt() !!}</p>

        <a href="{{ $page->url($featuredPost->getPath()) }}" title="Read - {{ $featuredPost->title }}"
            class="mb-4 text-blue uppercase font-semibold tracking-wide">Read</a>
    </div>
@endif

<div class="flex -mx-6">
    @foreach($posts->take(2) as $post)
        <div class="w-1/2 mx-6">
            @include('_components.post-preview-inline')
        </div>
    @endforeach
</div>

@include('_components.newsletter-signup')
@stop
