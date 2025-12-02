<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image',
        'gallery_id',
        'role',
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }
}
