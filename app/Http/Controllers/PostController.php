<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\view\View;

class PostController extends Controller
{
    // Acceder au accueil blog
    public function blog(): View
    {
        return view('posts.index',[
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    public function postsByCategory(Category $category):view
    {
        return view('posts.index',[
            //'posts' => $category->posts()->paginate(10),
            'posts' => Post::where(
                'category_id', $category->id
            )->latest()->paginate(10),    
        ]);
    }

    public function show(Post $post): View
    {
        return view('posts.show',[
            'post' => $post,
        ]);
    }
}
