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
            'profile_image' => 'user-cat.png',
            'post_code' => '111-1111',
            'address' => 'ueno',
            'building' => 'zoo',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('profiles')->insert($param);

        $param = [
            'user_id' => 2,
            'profile_image' => 'user-dog.png',
            'post_code' => '222-2222',
            'address' => 'ueno',
            'building' => 'zoo',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('profiles')->insert($param);

        $param = [
            'user_id' => 3,
            'profile_image' => 'user-tiger.png',
            'post_code' => '333-3333',
            'address' => 'ueno',
            'building' => 'zoo',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('profiles')->insert($param);

        /*$param = [
            'user_id' => 4,
            'profile_image' => 'person-4.png',
            'post_code' => '444-4444',
            'address' => 'ueno',
            'building' => 'zoo',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('profiles')->insert($param);*/


    }
}
