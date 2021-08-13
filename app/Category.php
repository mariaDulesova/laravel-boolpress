<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relazion e tra posts e categories
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
