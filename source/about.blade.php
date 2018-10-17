@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}" />
@endpush

@section('body')
<div class="md:flex -mx-4">
    <div class="mb-8 lg:mb-0 px-4 md:w-3/4">
        <h1>About</h1>

        <p><img src="https://tighten.co/assets/img/bios/matt.jpg" class="rounded-full w-32 float-right ml-2 mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo natus, amet molestiae! Quod cum laudantium, aperiam in omnis similique! Voluptate sit suscipit aperiam distinctio laudantium maiores eveniet in, inventore recusandae.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum officia dolorem accusantium veniam quae, possimus, temporibus explicabo magni voluptas. Molestiae fugit natus deserunt atque veniam possimus earum harum itaque est!</p>
    </div>
</div>
@endsection
