<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'item_name',
        'brand_name',
        'price',
        'description',
        'condition',
        'status',
    ];

    //--------------- for pro test ---------------------------

    public function chat()
    {
        return $this->hasMany(Chat::class, 'item_id', 'id');
    }
     public function chatToBuyer()
    {
        return $this->belongsToMany(User::class, 'chats', 'item_id', 'buyer_id');
    }
     public function chatToSeller()
    {
        return $this->belongsToMany(User::class, 'chats', 'item_id', 'seller_id');
    }
// -----------------------------------------------------------------


    public function purchase()
    {
        return $this->hasOne(Purchase::class, 'item_id', 'id');
    }
    public function category()
    {
        return $this->belongsToMany(Category::class, 'item_category', 'item_id', 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function likeToUser()
    {
        return $this->belongsToMany(User::class, 'likes', 'item_id', 'user_id');
    }

    public function CommentToUser()
    {
        return $this->belongsToMany(User::class, 'comments', 'item_id', 'user_id');
    }

    // いいねのリレーションを追加
    public function likes()
    {
        return $this->hasMany(Like::class, 'item_id', 'id');
    }

    // いいねのカウントを取得するアクセサ
    public function getLikesCount()
    {
        return $this->likes()->count(); // いいねのカウントを取得
    }
}
