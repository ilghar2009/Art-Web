<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    protected $primaryKey = 'gallery_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $withCount = ['likes'];

    protected $fillable = [
        'gallery_id',
        'title',
        'description',
        'category_id',
        'created_by',
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            $model->gallery_id = (string)Str::uuid();
        });
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images(){
        return $this->hasOne(Image::class, 'gallery_id')->where('role', true);
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'gallery_id');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'gallery_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

}
