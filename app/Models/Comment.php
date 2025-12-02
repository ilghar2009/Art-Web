<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
        'created_by',
        'commentable_id',
        'commentable_type',
        'reply_id',
        'status',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    public function parent(){
        return $this->belongsTo(Comment::class, 'reply_id', 'id');
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'reply_id', 'id')->with('replies');
    }


}
