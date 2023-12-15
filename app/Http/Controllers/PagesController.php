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
        $blogs = Blog::all();
        return view('pages/home', compact('blogs'));
    }

    public function blogview(Blog $blog)
    {
        $comments = $blog->comments; // Deze regel samen met chatgpt aangezien ik geen output kreeg
        return view('pages.blogview', compact('blog', 'comments'));
    }

    // oud project + aanpassing samen met chat gpt vooral de validate had ik niet aangedacht
    public function storeComment(Request $request, Blog $blog)
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

        return redirect()->back();
    }

    public function storeBlog(Request $request, Blog $blog)
{
    // Validate the form data
    $request->validate([
        'content' => 'required|string',
        'subject' => 'required|string',
        'user_id' => 'required|exists:users,id',
    ]);

    // Create a new comment, let the database handle the 'blog_id'
    $blog = Blog::create([
        'content' => $request->input('content'),
        'subject' => $request->input('subject'),
        'user_id' => $request->input('user_id'),
    ]);
    return redirect()->back();
}
}
