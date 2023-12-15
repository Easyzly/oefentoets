<?php

// File: database/factories/CommentFactory.php
//chat gpt generated zodat ik niet zelf alles hoef uit te schrijven
namespace Database\Factories;

use App\Models\Comment;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        // Get all existing user IDs
        $userIds = User::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'blog_id' => Blog::factory(),
            'content' => $this->faker->paragraph,
        ];
    }
}

