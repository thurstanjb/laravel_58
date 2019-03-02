<?php

namespace Tests\Unit;

use App\Comment;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function _it_can_create_its_model_factory()
    {
        $user = create(User::class);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => $user->email
        ]);
    }

    /**
     * @test
     */
    public function _it_can_return_its_comments()
    {
        $user = create(User::class);

        $comment = create(Comment::class, ['user_id' => $user->id]);
        $comment1 = create(Comment::class, ['user_id' => $user->id]);

        $this->assertCount(2, $user->comments);
    }
}
