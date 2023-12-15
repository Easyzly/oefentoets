<?php

// File: database/seeders/BlogSeeder.php
//chat gpt generated zodat ik niet zelf alles hoef uit te schrijven
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 blogs with 5 comments each
        Blog::factory(10)->create();
    }
}
