<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
class MakePostsCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = Post::create([
            'title'=>Str::random(10),
            'body'=>Str::random(10),
            
            
        ]);
        //Inser comments for the post 
        for($i=0; $i<5; $i++){
            $post->comments()->create([
            'body'=>Str::random(200),
            'user_id'=>1
            ]);
        }
    }
}