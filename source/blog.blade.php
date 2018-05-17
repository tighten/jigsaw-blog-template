@extends('_layouts.master')

@section('body')
<div class="md:flex -mx-4">
    <div class="mb-8 lg:mb-0 px-4 md:w-3/4">
        <h1 class="page-title">Blog</h1>
        @foreach ($posts as $post)
            @include('_components.post-preview-inline')
        @endforeach
    </div>
    <div class="px-4 md:w-1/4">
        <div class="flex items-center md:block text-center">
            <!-- Side bar stuff -->
        </div>
    </div>
</div>
@endsection
