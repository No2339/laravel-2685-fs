<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Model
{
    use HasFactory ,
    SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'email', 'mobile', 'roles', 'password'];

    protected function casts()
    {
        return [
            'password' => 'hashed'
        ];
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class); 
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
}
