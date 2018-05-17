<div class="mb-6 border-b">
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
</div>
