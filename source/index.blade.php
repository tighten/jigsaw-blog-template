@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->blogDescription }}" />
@endpush

@section('body')
<div class="flex flex-col-reverse my-16 lg:flex-row lg:mb-20">
    <div class="mt-8">
        <h1 class="text-4xl font-extrabold text-black leading-none">Welcome to {{ $page->siteName }}</h1>
        <h2 class="mb-4 text-4xl font-normal text-blue-darkest">Elegant docs powered by Jigsaw</h2>

        <p class="text-lg sm:w-3/4">{{ $page->siteDescription }}</p>

        <div class="flex my-8">
            <a href="/blog/getting-started" title="{{ $page->siteName }} getting started" class="bg-blue py-2 px-6 text-white rounded mr-4">Get started</a>

            <a href="https://jigsaw.tighten.co" title="Jigsaw by Tighten" class="bg-grey-light py-2 px-6 text-blue rounded">About Jigsaw</a>
        </div>
    </div>

    <img src="/assets/img/logo-large.svg" alt="{{ $page->siteName }} large logo" class="max-w-md mx-auto mb-6 lg:mb-0 ">
</div>

@if($featuredPost = $posts->where('featured')->first())
    <div class="w-full">
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

@foreach($posts->take(2) as $post)
    @include('_components.post-preview-inline')
@endforeach
@stop
