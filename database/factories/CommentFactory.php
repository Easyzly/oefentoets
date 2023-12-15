<?php

// File: database/factories/CommentFactory.php
//chat gpt generated zodat ik niet zelf alles hoef uit te schrijven

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'blog_id' => Blog::factory(),
            'content' => $this->faker->paragraph,
        ];
    }
}
