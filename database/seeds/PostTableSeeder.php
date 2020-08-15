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
        'user_id' => '1',
        'image_path' => 'PHP1',
        'title' => 'aaa',
        ]);
        $post->save();
          
        // 2レコード
        $post = new \App\Post([
        'user_id' => '2',
        'image_path' => 'PHP2',
        'title' => 'iii',
        ]);

        $post = new \App\Post([
            'user_id' => '3',
            'image_path' => 'PHP3',
            'title' => 'uuu',
            ]);
        $post->save();
        //
    }
}
