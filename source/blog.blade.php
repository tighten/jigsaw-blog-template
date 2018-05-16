@extends('_layouts.master')

@section('body')
<div class="md:flex -mx-4">
    <div class="mb-8 lg:mb-0 px-4 md:w-3/4">
        <h1 class="page-title">Blog</h1>

        <div class="">
            @foreach ($posts as $post)
            <a href="{{ $post->getPath() }}"><h2 class="mb-1">{{ $post->title }}</h2></a>

            <p class="text-grey-darker mb-2">
                {{ $post->getDate()->format('F j, Y') }}
            </p>

            <div class="mb-4">
                <p>{{ $post->excerpt() }}</p>
            </div>

            <p class="mb-6">
                <a href="{{ $post->getPath() }}">Read more ...</a>
            </p>
            @endforeach
        </div>
    </div>
    <div class="px-4 md:w-1/4">
        <div class="flex items-center md:block text-center">
            <!-- Side bar stuff -->
        </div>
    </div>
</div>
@endsection
