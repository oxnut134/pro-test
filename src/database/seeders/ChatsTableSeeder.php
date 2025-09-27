<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Chat;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Chat::create([
            'buyer_id' => 2,
            'seller_id' => 1,
            'item_id' => 3,
            'buyer_score' => 4,
            'seller_score' => 3,
        ]);
        Chat::create([
            'buyer_id' => 3,
            'seller_id' => 2,
            'item_id' => 6,
            'buyer_score' => 3,
            'seller_score' => 2,
        ]);
        Chat::create([
            'buyer_id' => 3,
            'seller_id' => 1,
            'item_id' => 1,
            'buyer_score' => 4,
            'seller_score' => 5,
        ]);
    }
}
