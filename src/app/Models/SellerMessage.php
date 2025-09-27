<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'seller_message',
        'image_by_seller',
    ];
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }
}
