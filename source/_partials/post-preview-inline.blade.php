<div class="mb-6 border-b">
    <a href="{{ $page->url($post->getPath()) }}"><h2 class="mb-1">{{ $post->title }}</h2></a>

    <p class="text-grey-darker -mb-2">
        {{ $post->getDate()->format('F j, Y') }}
    </p>

    <p class="pb-0">{!! $post->excerpt() !!}</p>

    <p class="mb-2">
        <a href="{{ $page->url($post->getPath()) }}">Read more ...</a>
    </p>
</div>
