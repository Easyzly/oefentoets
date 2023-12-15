<?php

// File: database/seeders/CommentSeeder.php

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
        // Assuming you have 10 blogs created by BlogSeeder, 
        // and you want each blog to have 5 comments
        $blogs = \App\Models\Blog::all();

        foreach ($blogs as $blog) {
            Comment::factory(5)->create([
                'blog_id' => $blog->id,
            ]);
        }
    }
}
