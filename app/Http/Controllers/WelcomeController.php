<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::all();
        
        return view('welcome', compact('categories', 'tags', 'posts'));
    }
}
