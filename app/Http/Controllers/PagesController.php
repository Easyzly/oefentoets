<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;


class PagesController extends Controller
{
    public function home()
    {
        return view('pages/home');
    }

    public function blogview(Blog $blog)
    {
        $comments = $blog->comments; // Deze regel samen met chatgpt aangezien ik geen output kreeg
        return view('pages.blogview', compact('blog', 'comments'));
    }

    // oud project + aanpassing samen met chat gpt vooral de validate had ik niet aangedacht
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'blog_id' => 'required|exists:blogs,id',
        ]);

        // Create a new comment
        $comment = Comment::create([
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id'),
            'blog_id' => $request->input('blog_id'),
        ]);

        // You can add any additional logic here, e.g., redirect to a success page

        return redirect()->route('blogs.show', ['blog' => $request->input('blog_id')])
            ->with('success', 'Comment created successfully');
    }
}
