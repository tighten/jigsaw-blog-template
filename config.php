<?php

return [
    'siteName' => 'Jigsaw Blog',
    'siteDescription' => 'Generate an elegant blog with Jigsaw',
    'title' => 'Blog powered by Jigsaw',
    'baseUrl' => 'http://jigsaw-blog-skeleton.test/',
    'googleSearchAPIKey' => '',
    'googleSearchEngineId' => '',
    'production' => false,
    'collections' => [
        'posts' => [
            'author' => 'Author Name', // Default author if not provided in given post
            'sort' => '-date',
            'path' => 'blog/{filename}',
            'coverImage' => function ($page) {
                return $page->cover_image ?? null;
            },
            'excerpt' => function ($page, $characters = 150) {
                return substr(strip_tags($page->getContent()), 0, $characters);
            },
            'featured' => function ($page) {
                return isset($page->featured) && true === $page->featured;
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
    'googleSearchUrl' => function($page) {
        return 'https://www.googleapis.com/customsearch/v1' . '?' . http_build_query([
            'key' => $page->googleSearchAPIKey,
            'cx' => $page->googleSearchEngineId
        ]);
    },
    'url' => function ($page, $path) {
        return rtrim($page->baseUrl, '/') . '/' . ltrim($path, '/');
    }
];
