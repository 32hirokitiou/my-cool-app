<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post([
        'image_path' => 'PHP1',
        'title' => 'aaa',
        ]);
        $post->save();
          
        // 2レコード
        $post = new \App\Post([
        'image_path' => 'PHP2',
        'title' => 'iii',
        ]);
        $post->save();
        //
    }
}
