<?php

namespace Database\Factories;

use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\Factory;

class likeFactory extends Factory
{
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id' => \App\Models\Item::factory(), // 関連するアイテムのIDを生成
            'user_id' => \App\Models\User::factory(), // 関連するユーザーのIDを生成
        ];
    }
}
