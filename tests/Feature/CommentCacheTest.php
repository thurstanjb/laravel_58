<?php

namespace Tests\Feature;

use App\Comment;
use Closure;
use Faker\Test\Provider\Collection;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentCacheTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _it_can_cache_its_comments()
    {
        $comment = create(Comment::class);
        $comment2 = create(Comment::class);
        $comment3 = create(Comment::class);
        $comment4 = create(Comment::class);

        $collection = Comment::all();

        Cache::shouldReceive('remember')
            ->once()
            ->set('comments', $collection)
            ->with('comments', 3600, Closure::class)
            ->andReturns(Collection::class);

        $response = $this->get('http://laravel58.test/comments');
        $response->assertStatus(200);

    }
}
