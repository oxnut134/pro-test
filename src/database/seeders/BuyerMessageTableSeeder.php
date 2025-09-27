<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BuyerMessageTableSeeder extends Seeder
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
            'buyer_message' => "購入者テスト中-chat1",
            'image_by_buyer' => null,
        ];
        DB::table('buyer_messages')->insert($param);

        $param = [
            'chat_id' => 2,
            'buyer_message' => "購入者テスト中-chat2",
            'image_by_buyer' => null,
        ];
        DB::table('buyer_messages')->insert($param);
    }
}
