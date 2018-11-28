@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}" />
@endpush

@section('body')
<h1>About</h1>

<img src="https://tighten.co/assets/img/blog/how-I-mostly-overcame-my-fear-of-public-speaking-feature-image.png"
    class="flex rounded-full w-64 h-64 bg-center bg-cover mx-auto my-10 md:float-right md:ml-10">

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo natus, amet ! Quod  laudantium, aperiam in omnis similique! Voluptate sit suscipit aperiam distinctio laudantium maiores eveniet in, inventore recusandae.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum officia dolorem accusantium veniam quae, possimus, temporibus explicabo magni voluptas.  fugit natus deserunt atque veniam possimus earum harum itaque est!</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum officia dolorem accusantium veniam quae, possimus, temporibus explicabo magni voluptas.  fugit natus deserunt atque veniam!</p>

@endsection
