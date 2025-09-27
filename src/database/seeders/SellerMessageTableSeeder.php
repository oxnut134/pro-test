<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SellerMessageTableSeeder extends Seeder
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
            'seller_message' => "出品者テスト中",
            'image_by_seller' => null,
        ];
        DB::table('seller_messages')->insert($param);

    }
}
