<?php

return [
    'blogTitle' => 'My Blog About Jigsaws',
    'author' => 'Matt Stauffer',
    'baseUrl' => 'http://jigsaw-blog-skeleton.test/',
    'production' => false,
    'collections' => [
        'posts' => [
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
