<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $param = [
            'category' => 'ファッション',
            //'created_at' => now(),
            //'updated_at' => now(),
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => '家電',
            //'created_at' => now(),
            //'updated_at' => now(),
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'インテリア',
            //'created_at' => now(),
            //'updated_at' => now(),
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'レディース',
            //'created_at' => now(),
            //'updated_at' => now(),
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'メンズ',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'コスメ',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => '本',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'ゲーム',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'スポーツ',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'キッチン',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'ハンドメイド',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'アクセサリー',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'おもちゃ',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'ベビー・キッズ',
            //'created_at' => now(),
            //'updated_at' => now(),

        ];
        DB::table('categories')->insert($param);
    }
}
