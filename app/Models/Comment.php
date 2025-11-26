<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
        'created_by',
        'gallery_id',
        'category_id',
        'reply_id',
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }
}
