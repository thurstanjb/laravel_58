<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function show(Comment $comment){
        $this->authorize('show', $comment);
    }

    public function update(Comment $comment){
        $this->authorize('update', $comment);
    }
}
