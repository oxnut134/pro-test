<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MessagesTableSeeder extends Seeder
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
            'chat_id' => 1,
            'position' => "buyer",
            'message' => "購入者１テスト中-chat1",
            'image' => null,
            'created_at' => "2023-09-25 14:30:00",
            'updated_at' => "2023-09-25 14:30:00"
        ];
        DB::table('messages')->insert($param);

        $param = [
            'chat_id' => 1,
            'position' => "seller",
            'message' => "出品者テスト中-chat1",
            'image' => null,
            'created_at' => "2023-09-25 16:30:00",
            'updated_at' => "2023-09-25 16:30:00"
        ];
        DB::table('messages')->insert($param);

        $param = [
            'chat_id' => 1,
            'position' => "buyer",
            'message' => "購入者２テスト中-chat1",
            'image' => null,
            'created_at' => "2023-09-25 18:30:00",
            'updated_at' => "2023-09-26 18:30:00"
        ];
        DB::table('messages')->insert($param);

        $param = [
            'chat_id' => 2,
            'position' => "buyer",
            'message' => "購入者テスト中-chat2",
            'image' => null,
            'created_at' => "2023-09-25 10:00:00",
            'updated_at' => "2023-09-25 10:00:00"
        ];
        DB::table('messages')->insert($param);
        $param = [
            'chat_id' => 2,
            'position' => "seller",
            'message' => "出品者テスト中-chat2",
            'image' => null,
            'created_at' => "2023-09-25 16:20:00",
            'updated_at' => "2023-09-25 16:20:00"
        ];
        DB::table('messages')->insert($param);
        $param = [
            'chat_id' => 3,
            'position' => "buyer",
            'message' => "購入者テスト中-chat3",
            'image' => null,
            'created_at' => "2023-09-25 13:30:00",
            'updated_at' => "2023-09-25 13:30:00"
        ];
        DB::table('messages')->insert($param);
    }
}
