<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show($id) {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.show', compact('tag'));
    }
}
