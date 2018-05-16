@extends('_layouts.master')

@section('body')
<div class="md:flex -mx-4">
    <div class="mb-8 lg:mb-0 px-4 md:w-3/4">
        <h1 class="page-title">Blog</h1>

        <div class="">
            <h2 class="mb-1">Blog post title</h2>

            <p class="text-grey-darker mb-2">
                May 8, 2018
            </p>

            <div class="mb-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lorem erat, luctus at diam sed, dapibus facilisis purus. In laoreet enim nunc, ut pretium arcu scelerisque in. Nunc eu cursus nibh. Etiam pulvinar vulputate libero sed molestie. In condimentum varius faucibus. Vestibulum non blandit sapien, quis tincidunt augue. Aliquam congue sapien eget mattis sagittis.</p>
            </div>

            <p>
                <a href="url">Read more ...</a>
            </p>
        </div>
    </div>
    <div class="px-4 md:w-1/4">
        <div class="flex items-center md:block text-center">
            <!-- Side bar stuff -->
        </div>
    </div>
</div>
@endsection
