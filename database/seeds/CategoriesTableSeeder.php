<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Foreach_;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Fashion', 'Food', 'Technology', 'Economy'];
        foreach($categories as $category){

            //1. Creo un'istanza di oggetto Category
            $newCategory= new Category();
            //2. Valorizzo le proprieta'
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category, '-');
            //3.Salvo
            $newCategory->save();

        }
        

        
    }
}
