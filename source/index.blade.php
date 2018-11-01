@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->blogDescription }}" />
@endpush

@section('body')
<div class="my-6 pb-6 border-b border-light-grey">
    <p>Welcome to my blog about Jigsaws.</p>
    <p>Good golly, I love Jigsaws.</p>
</div>

@foreach ($posts->slice(0, 5) as $post)
    @include('_partials.post-preview-inline')
@endforeach

<a href="{{ $page->url('/blog') }}">See all blog posts</a>
@endsection
