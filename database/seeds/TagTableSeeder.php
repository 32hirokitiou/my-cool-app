<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // 1レコード
        $tag = new \App\Tag([
            'name' => 'tag1',
        ]);
        $tag->save();
        // 2レコード
        $tag = new \App\Tag([
            'name' => 'tag2',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => 'tag3',
        ]);
        $tag->save();
        // 2レコード
        $tag = new \App\Tag([
            'name' => 'tag4',
        ]);
        $tag->save();
        $tag = new \App\Tag([
            'name' => 'tag5',
        ]);
        $tag->save();
        // 2レコード
        $tag = new \App\Tag([
            'name' => 'tag6',
        ]);
        $tag->save();
    }
}
