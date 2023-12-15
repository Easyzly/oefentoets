<?php

// File: app/Models/Comment.php
//chat gpt generated zodat ik niet zelf alles hoef uit te schrijven

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'blog_id',
        'content',
    ];

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the blog that the comment belongs to.
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
