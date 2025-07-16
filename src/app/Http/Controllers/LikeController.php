<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Item;

class LikeController extends Controller
{
    public function add($id)
    {
        $current_user_id = Auth::id(); // 本番ではAuth::id()を使用
        // いいねの存在確認とカウントを同時に取得
        $likeExists = Like::where('item_id', $id)
            ->where('user_id', $current_user_id)
            ->exists();

        if (!$likeExists) {
            Like::create([
                'item_id' => $id,
                'user_id' => $current_user_id
            ]);
        }

        $likeCount = Like::where('item_id', $id)->count();
        return response()->json(['likes' => $likeCount]);
    }

    public function remove($id)
    {
        $current_user_id = Auth::id(); // 本番ではAuth::id()を使用
        Like::where('item_id', $id)
            ->where('user_id', $current_user_id)
            ->delete();

        $likeCount = Like::where('item_id', $id)->count();
        return response()->json(['likes' => $likeCount]);
    }
}
