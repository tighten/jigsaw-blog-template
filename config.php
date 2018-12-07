<?php

return [
    'siteName' => 'Blog Starter Template',
    'siteDescription' => 'Generate an elegant blog with Jigsaw',
    'siteAuthor' => 'Author Name',
    'title' => 'Blog powered by Jigsaw',
    'baseUrl' => 'http://jigsaw-blog-skeleton.test/',
    'production' => false,
    'collections' => [
        'posts' => [
            'author' => 'Author Name', // Default author if not provided in given post
            'sort' => '-date',
            'path' => 'blog/{filename}',
        ],
        'categories' => [
            'path' => '/blog/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
    ],

    // helpers
    'excerpt' => function ($page, $length = 255) {
        $content = $page->getContent();

        return (strlen($content) > $length) ?
            preg_replace('/\s+?(\S+)?$/', '', strip_tags(substr($content, 0, $length), '<code>')) . '...' :
            strip_tags($content, '<code>');
    },
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'url' => function ($page, $path) {
        return rtrim($page->baseUrl, '/') . '/' . ltrim($path, '/');
    },
];
