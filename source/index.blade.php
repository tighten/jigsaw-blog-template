@extends('_layouts.master')

@section('body')
<div class="md:flex -mx-4">
    <div class="mb-8 lg:mb-0 px-4 md:w-3/4">
        <div class="mb-6 pb-6 border-b border-light-grey">
            <p>Welcome to my blog about Jigsaws.</p>
            <p>Good golly, I love Jigsaws.</p>
        </div>

        @foreach ($posts->slice(0, 5) as $post)
            @include('_components.post-preview-inline')
        @endforeach

        <a href="{{ $page->url('/blog') }}">See all blog posts</a>
    </div>
    <div class="px-4 md:w-1/4">
        <div class="flex items-center md:block text-center">
            <!-- Side bar stuff -->
        </div>
    </div>
</div>
@endsection
