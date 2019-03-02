<?php

namespace Tests\Feature;

use App\Comment;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentPolicyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _a_comment_can_be_updated_only_by_its_user()
    {
        $author = create(User::class);
        $user = create(User::class);
        $comment = create(Comment::class, ['user_id' => $author->id]);
        $this->signIn($author);

        $response = $this->patch('http://laravel58.test/comments/'.$comment->id);

        $response->assertStatus(200);

        $this->signIn($user);

        $response = $this->patch('http://laravel58.test/comments/'.$comment->id);
        $response->assertStatus(403); // Forbidden
    }

    /**
     * @test
     */
    public function _any_user_can_view_a_comment()
    {
        $author = create(User::class);
        $user = create(User::class);
        $comment = create(Comment::class, ['user_id' => $author->id]);

        $this->signIn($user);

        $response = $this->get('http://laravel58.test/comments/'.$comment->id);
        $response->assertStatus(200);
    }
}
