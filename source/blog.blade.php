@extends('_layouts.master')

@section('body')
<div class="md:flex -mx-4">
    <div class="mb-8 lg:mb-0 px-4 md:w-3/4">
        <h1>Blog</h1>

        <div class="">
            <h2 class="mb-1">Blog post title</h2>

            <p class="text-grey-dark">
                May 8, 2018
            </p>

            <div class="mb-4">
                <p>Intro text.</p>
            </div>

            <p>
                <a href="url">Read more ...</a>
            </p>
        </div>
    </div>
    <div class="px-4 md:w-1/4">
        <div class="flex items-center md:block text-center">
            Side bar stuff
        </div>
    </div>
</div>
@endsection
