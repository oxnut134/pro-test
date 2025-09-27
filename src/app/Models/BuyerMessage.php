<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'buyer_message',
        'image_by_buyer',
    ];
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }
}
