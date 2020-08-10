<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    
            // 1レコード
            $tag = new \App\Tag([
            'name' => 'aaaii',
            ]);
            $tag->save();
            // 2レコード
            $tag = new \App\Tag([
            'name' => 'uiuwaw',
            ]);
            $tag->save();
    }
}
