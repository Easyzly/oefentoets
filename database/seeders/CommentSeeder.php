<?php

// File: database/seeders/CommentSeeder.php
//chat gpt generated zodat ik niet zelf alles hoef uit te schrijven

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory(1)->create(); // Adjust the number of comments as needed
    }
}
