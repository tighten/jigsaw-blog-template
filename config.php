<?php

return [
    'siteName' => 'My Jigsaw Blog',
    'siteAuthor' => 'Matt Stauffer',
    'siteDescription' => 'The personal blog of Matt Stauffer, a deep lover of Jigsaws.',
    'baseUrl' => 'http://jigsaw-blog-skeleton.test/',
    'copyrightHolder' => 'Tighten',
    'searchDomain' => 'jigsaw-blog-skeleton.text', // for Google search
    'production' => false,
    'collections' => [
        'posts' => [
            'author' => 'Matt Stauffer', // Default author if not provided in given post
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
    'url' => function ($page, $path) {
        return rtrim($page->baseUrl, '/') . '/' . ltrim($path, '/');
    },
];
