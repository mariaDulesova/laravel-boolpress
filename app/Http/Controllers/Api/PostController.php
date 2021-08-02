<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // Recupero archivio dei post
    public function index() {
        // $posts = Post::all();
        $posts = Post::paginate(6);
        return response()->json($posts);
    }

    // Recupero dettaglio del post
    public function show($slug){
        $post=Post::where('slug', $slug)
        ->with('category', 'tags')
        ->first();

        return response()->json($post);
    }
}
