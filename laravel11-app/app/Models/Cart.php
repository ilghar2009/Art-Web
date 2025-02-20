<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    protected $primaryKey = 'cart_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public $fillable =[
        'cart_id',
        'user_id'
    ];

    protected static function boot() {
        parent::boot();
        static::creating(function ($model){
            $model->cart_id = (string)Str::uuid();
        });
    }
}
