<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'title', 'body'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
