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
            'excerpt' => function ($page, $characters = 150) {
                return substr(strip_tags($page->getContent()), 0, $characters);
            },
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
