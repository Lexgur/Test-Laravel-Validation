<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags', 'category')->latest()->paginate(10);

        return view('articles.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('tags')->findOrFail($id);

        return view('articles.show', compact('post'));
    }
}
