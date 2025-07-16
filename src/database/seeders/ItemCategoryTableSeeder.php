<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $param = [
            'item_id' => 1,
            'category_id' => 1
        ];
        DB::table('item_category')->insert($param);
        //2
        $param = [
            'item_id' => 1,
            'category_id' => 5
        ];
        DB::table('item_category')->insert($param);
        //3
        $param = [
            'item_id' => 1,
            'category_id' => 12
        ];
        DB::table('item_category')->insert($param);
        //4
        $param = [
            'item_id' => 2,
            'category_id' => 2
        ];
        DB::table('item_category')->insert($param);
        //5
        $param = [
            'item_id' => 3,
            'category_id' => 10
        ];
        DB::table('item_category')->insert($param);
        //6
        $param = [
            'item_id' => 4,
            'category_id' => 1
        ];
        DB::table('item_category')->insert($param);
        //7
        $param = [
            'item_id' => 4,
            'category_id' => 5
        ];
        DB::table('item_category')->insert($param);
        //8
        $param = [
            'item_id' => 5,
            'category_id' => 2
        ];
        DB::table('item_category')->insert($param);
        //9
        $param = [
            'item_id' => 6,
            'category_id' => 2
        ];
        DB::table('item_category')->insert($param);
        //10
        $param = [
            'item_id' => 7,
            'category_id' => 1
        ];
        //10
        $param = [
            'item_id' => 7,
            'category_id' => 4
        ];
        DB::table('item_category')->insert($param);
        //12
        $param = [
            'item_id' => 7,
            'category_id' => 12
        ];
        DB::table('item_category')->insert($param);
        //13
        $param = [
            'item_id' => 8,
            'category_id' => 9
        ];
        DB::table('item_category')->insert($param);
        //14
        $param = [
            'item_id' => 8,
            'category_id' => 10
        ];
        DB::table('item_category')->insert($param);
        //15
        $param = [
            'item_id' => 9,
            'category_id' => 10
        ];
        DB::table('item_category')->insert($param);
        //16
        $param = [
            'item_id' => 9,
            'category_id' => 11
        ];
        DB::table('item_category')->insert($param);
        //17
        $param = [
            'item_id' => 10,
            'category_id' => 1
        ];
        DB::table('item_category')->insert($param);
        //18
        $param = [
            'item_id' => 10,
            'category_id' => 4
        ];
        DB::table('item_category')->insert($param);
        //19
        $param = [
            'item_id' => 10,
            'category_id' => 6
        ];
        DB::table('item_category')->insert($param);


    }
}
