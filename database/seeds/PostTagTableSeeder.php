<?php

use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $postTag = new \App\PostTag([
            'post_id' => '1',
            'tag_id' => '1',
        ]);
        $postTag->save();
        
        $postTag = new \App\PostTag([
            'post_id' => '1',
            'tag_id' => '2',
        ]);
        $postTag->save();
    }
}
