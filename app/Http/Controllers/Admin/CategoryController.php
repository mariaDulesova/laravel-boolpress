<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show($id) {
        //1. Recupero Categorie con quel ID
        $category = Category::findOrFail($id);
        //2. Passo i dati recuperati alla vista show.blade della Categoria
        return view('admin.categories.show', compact('category'));
        
    }
}
