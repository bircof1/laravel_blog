<?php

use App\Category;
use App\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($post=0; $post<10; $post++){
        //     Post::create([
        //         'title'=>"Article n°$post",
        //         'body'=>"Je suis le contenu de l'article n°$post",
        //     ]);
        // }
       
        factory(Post::class,45)->create();
    }
}
