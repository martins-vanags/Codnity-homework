<?php

namespace Tests\Feature;

use App\Models\Articles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScraperTest extends TestCase
{
    use RefreshDatabase;


    public function test_scraper_artisan_command_reads_first_30_articles_from_hacker_news_website()
    {
        $this->artisan('scrape:hacker-news')->assertExitCode(0);

        $articles = Articles::query();

        $this->assertEquals(30, $articles->get()->count());
    }
}
