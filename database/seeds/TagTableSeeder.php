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

        $tag = new \App\Tag([
            'name' => '#プレーントゥ',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#ストレートチップ',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#ホールカット',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#ウィングチップ',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#Uチップ',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#モンクストラップ',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#ダブルモンクストラップ',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#ローファー',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#パンプス',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#サイドゴア',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#黒',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#茶',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#赤',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#紺',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#その他カラー',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#その他レザー用品',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#経年変化',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#ビンテージ',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#色落ち',
        ]);
        $tag->save();

        $tag = new \App\Tag([
            'name' => '#鏡面磨き',
        ]);
        $tag->save();
    }
}
