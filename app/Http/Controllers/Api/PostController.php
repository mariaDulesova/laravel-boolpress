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
        
        //corrisponde a foreach
        $posts->each (function ($post){ 
            if(!empty($post)) {
                if($post->cover){
                    $post->cover=url('storage/'.$post->cover);
                } else {
                    $post->cover=url('img/placeholder.png');
                }
            }
        });
        return response()->json($posts);
    }

    // Recupero dettaglio del post
    public function show($slug){
        $post=Post::where('slug', $slug)
        ->with('category', 'tags')
        ->first();

        if(!empty($post)) {
            if($post->cover){
                $post->cover=url('storage/'.$post->cover);
            } else {
                $post->cover=url('img/placeholder.png');
            }
        }

        return response()->json($post);
    }
}
