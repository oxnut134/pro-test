<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchasestableSeeder extends Seeder
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
            'payment_method' => 'コンビニ払い',
            'delivery_address' => '東京都中区１－１－１',
        ];
        DB::table('purchases')->insert($param);
    }
}
