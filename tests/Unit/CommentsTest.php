<?php

namespace Tests\Unit;

use App\Comment;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _it_can_create_its_model_factory()
    {
        $comment = create(Comment::class);

        $this->assertDatabaseHas('comments', [
            'id' => $comment->id,
            'user_id' => $comment->user_id
        ]);
    }

    /**
     * @test
     */
    public function _it_can_return_its_user()
    {
        $user = create(User::class);
        $comment = create(Comment::class, ['user_id' => $user->id]);

        $this->assertEquals($user->name, $comment->user->name);
    }
}
