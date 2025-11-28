<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'gallery_id',
        'ip',
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
