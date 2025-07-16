<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'profile_image' => 'person-1.png',
            'post_code' => '111-1111',
            'address' => '東京都',
            'building' => '中央ビル',
        ];
        DB::table('profiles')->insert($param);

        $param = [
            'user_id' => 2,
            'profile_image' => 'person-2.png',
            'post_code' => '222-2222',
            'address' => '神奈川県',
            'building' => '横浜ビル',
        ];
        DB::table('profiles')->insert($param);


    }
}
