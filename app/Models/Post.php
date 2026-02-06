<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    // Optionnel: check if current user liked
    public function isLikedBy(?int $userId): bool
    {
        if (!$userId)
            return false;

        return $this->likes()->where('user_id', $userId)->exists();
    }
}
