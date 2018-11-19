<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $data = $jigsaw->getCollection('posts')->map(function ($page) {
            return [
                'title' => $page->title,
                'content' => $page->getContent(),
                'categories' => $page->categories ? implode(', ', $page->categories) : '',
            ];
        });

        $index = fopen($jigsaw->getDestinationPath() . '/index.json', 'w');
        fwrite($index, json_encode($data));
        fclose($index);
    }
}
