<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    protected $comments = null;


    public function index(){
        $comments = Cache::remember('comments', 3600, function () {
            return Comment::all();
        });

    }

    public function show(Comment $comment){
        $this->authorize('show', $comment);

    }

    public function update(Comment $comment){
        $this->authorize('update', $comment);
    }
}
