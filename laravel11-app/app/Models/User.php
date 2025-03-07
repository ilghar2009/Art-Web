<?php

namespace App\Models;

// use Illuminate\Contracts\AuthController\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $primaryKey = "user_id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            $model->user_id = (string)Str::uuid();
        });
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function carts(){
        return $this->hasOne(Cart::class);
    }

    public function galleries(){
        return $this->hasMany(Gallery::class, 'created_by', 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'created_by', 'user_id');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
