<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //Recupero la lista di categorie
    public function index(){
        $categories=Category::all();
        return response()->json($categories);
    }
    //Recupero la singola categoria
    public function show($slug) {
        $category=Category::where('slug', $slug)->with('posts')->first();
        return response()->json($category);
    }
}
