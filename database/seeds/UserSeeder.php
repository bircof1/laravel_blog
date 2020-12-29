<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($user=0; $user<10; $user++){
        //     User::create([
        //         'name'=>"Mary$user",
        //         'email'=>"mary$user@gmail.com",
        //         'password'=>bcrypt('secret'),
        //     ]);
        // }

        // Permet de créer un utilisateur sans les relations
        // factory(User::class,30)->create();

        // Permet de créer un utilisateur avec un article

        // factory(User::class,10)->create()->each( function($user){
        //     $user->posts()->save(factory(Post::class)->make());
        // });

        // Permet de créer un utilisateur avec plusieurs articles

        $user=factory(User::class,15)->create();
        $user->each(function ($user){
            factory(Post::class,20)->create([
                'user_id'=>$user->id,
            ]);
        });

    }
}
