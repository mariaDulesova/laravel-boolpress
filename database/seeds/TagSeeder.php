<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Start-up', 'Events', 'News', 'People', 'Europe', 'Asia', 'North America', 'South America', 'Climate'];
        foreach($tags as $tag) {
            //1. Creo un istanza
            $newTag = new Tag();
            //2. Valorizzo le proprieta'
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag, '-');
            //3. Salvo
            $newTag->save();
        }
    }
}
