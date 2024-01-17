<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Acceder au accueil blog
    public function blog(){
        return view('posts.index',[
            'posts' => Post::latest()->paginate(10),
        ]);
    }
}
