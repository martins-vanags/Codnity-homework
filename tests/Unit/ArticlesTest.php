<?php

namespace Tests\Unit;

use App\Models\Articles;
use App\Models\User;
use Tests\TestCase;


class ArticlesTest extends TestCase
{

    public function test_auth_user_can_view_articles()
    {
        $this->get(route('articles'))->assertStatus(302)->assertRedirect('login');

        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get(route('articles'))->assertStatus(200)->assertSee(Articles::get());
    }

    public function test_auth_user_can_delete_article()
    {
        Articles::create([
            'title' => 'test',
            'created_at' => now(),
        ]);

        $article = Articles::where('title', 'test')->pluck('id');

        $this->delete(route('article.destroy', ['article' => $article]))->assertStatus(302)->assertRedirect('login');

        $user = User::factory()->create();
        $this->actingAs($user);

        $this->delete(route('article.destroy', [
            'article' => $article
        ]))
            ->assertStatus(200)
            ->assertSee([
                'status' => true,
            ]);

        $this->assertEquals(0, Articles::get()->count());
        $this->assertEquals(1, Articles::withTrashed()->get()->count());
    }
}
