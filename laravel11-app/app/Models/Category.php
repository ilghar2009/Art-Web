<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $primaryKey = "category_id";
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'category_id',
        'title',
        'image',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->category_id = (string)Str::uuid();
        });
    }
}
