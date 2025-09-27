<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'buyer_id',
        'seller_id',
        'item_id',
        'score_by_buyer',
        'score_by_seller',
    ];
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }
    public function buyerMessage()
    {
        return $this->hasMany(BuyerMessage::class, 'chat_id', 'id');
    }
    public function sellerMessage()
    {
        return $this->hasMany(SellerMessage::class, 'chat_id', 'id');
    }
}
