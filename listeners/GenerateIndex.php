<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $data[] = $jigsaw->getCollection('posts')->map(function ($page) use ($jigsaw) {
            return [
                'title' => $page->title,
                'categories' => $page->categories ? implode(', ', $page->categories) : '',
                'link' => $jigsaw->getConfig('baseUrl') . $page->getPath(),
                'snippet' => $page->excerpt(),
            ];
        })->values();

        $index = fopen($jigsaw->getDestinationPath() . '/index.json', 'w');
        fwrite($index, json_encode($data));
        fclose($index);
    }
}
