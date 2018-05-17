<?php

return [
    'blogTitle' => 'My Blog About Jigsaws',
    'blogAuthor' => 'Matt Stauffer',
    'baseUrl' => 'http://jigsaw-blog-skeleton.test/',
    'searchDomain' => 'jigsaw-blog-skeleton.text', // for Google search
    'production' => false,
    'collections' => [
        'posts' => [
            'author' => 'Matt Stauffer', // Default author if not provided in given post
            'sort' => '-date',
            'path' => 'blog/{date|Y-m-d}/{filename}',
            'excerpt' => function ($page, $characters = 50) {
                return substr(strip_tags($page->getContent()), 0, $characters);
            },
        ]
    ],
    // helpers
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
];
