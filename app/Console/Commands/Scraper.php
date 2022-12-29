<?php

namespace App\Console\Commands;

use App\Models\Articles;
use Goutte\Client;
use Illuminate\Console\Command;

class Scraper extends Command
{
    protected $signature = 'scrape:hacker-news';

    protected $description = 'Scrape https://news.ycombinator.com/ and store title,link,points,date created';

    public function handle()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://news.ycombinator.com/');

        $titles = $crawler->filter('span.titleline > a')->extract(['_text']);
        $link = $crawler->filter('span.titleline > a')->extract(['href']);
        $points = $crawler->filter('.score')->extract(['_text']);
        $dateCreated = $crawler->filter('.age')->extract(['title']);

        for ($i = 0; $i < count($titles); $i++) {
            $title = array_key_exists($i, $titles) ? $titles[$i] : null;

            $article = Articles::where('title', $title);

            if ($article->exists()) {
                $article->update([
                    'points' => array_key_exists($i, $points) ? $points[$i] : null,
                ]);
            } else {
                Articles::create([
                    'title' => $title,
                    'points' => array_key_exists($i, $points) ? $points[$i] : null,
                    'link' => array_key_exists($i, $link) ? $link[$i] : null,
                    'created_at' => array_key_exists($i, $dateCreated) ? $dateCreated[$i] : null,
                ]);
            }
        }
    }
}
