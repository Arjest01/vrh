<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Acceder au accueil blog
    public function blog(){
        return view('posts.index');
    }
}
