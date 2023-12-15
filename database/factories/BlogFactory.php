<?php

// File: database/factories/BlogFactory.php
//chat gpt generated zodat ik niet zelf alles hoef uit te schrijven
// File: database/factories/BlogFactory.php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Create a blog with random user ID
        $user = User::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'subject' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Blog $blog) {
            // For each blog, create 5 comments with random user IDs
            Comment::factory(5)->create([
                'blog_id' => $blog->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        });
    }
}
