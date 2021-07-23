<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $newPost = new Post();

            $newPost->title = "Titolo articolo " . $i;
            $newPost->content = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati fugit cupiditate nesciunt quia quod doloremque dolor nisi eaque? Rerum ipsa, doloribus perferendis nam placeat dolores ab fugiat repudiandae labore laborum quaerat quo eveniet, veniam vitae commodi? Quos modi magni labore ducimus, autem esse consequuntur non optio soluta fuga, magnam nam quam cupiditate accusantium, neque consequatur tempore quibusdam expedita delectus sapiente veniam earum porro error! Quis aspernatur vel placeat, cum quam deleniti provident architecto nihil possimus quae voluptate quas nesciunt velit doloribus esse nostrum ullam. Excepturi quae atque iste. Nobis similique consequuntur, ex nihil veritatis quaerat, quos repudiandae nesciunt nulla tenetur officia ab id distinctio nam. ";
            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->save();

        }
    }
}
