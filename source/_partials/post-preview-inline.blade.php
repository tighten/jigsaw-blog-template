<div class="flex flex-col mb-6 border-b-2">
    <p class="text-grey font-semi-bold mb-0">
        {{ $post->getDate()->format('F j, Y') }}
    </p>

    <h2 class="text-3xl">
        <a href="{{ $page->url($post->getPath()) }}"
            title="Read more - {{ $post->title }}"
            class="text-black">
            {{ $post->title }}
        </a>
    </h2>

    <p class="mb-4 text-lg">{!! $post->excerpt() !!}</p>

    <a href="{{ $page->url($post->getPath()) }}"
        title="Read more - {{ $post->title }}"
        class="mb-4 text-blue uppercase font-semibold tracking-wide">
        Read
    </a>
</div>
