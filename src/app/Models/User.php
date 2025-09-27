<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use Billable;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_confirmation',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'password_confirmation',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/
//  ---------------- for pro test ------------------
    public function chatByBuyer()
    {
        return $this->hasMany(Chat::class, 'buyer_id', 'id');
    }
    public function chatBySeller()
    {
        return $this->hasMany(Chat::class, 'seller_id', 'id');
    }
     public function chatToItemByBuyer()
    {
        return $this->belongsToMany(Item::class, 'chats', 'buyer_id', 'item_id');
    }
     public function chatToItemBySeller()
    {
        return $this->belongsToMany(Item::class, 'chats', 'seller_id', 'item_id');
    }

// --------------------------------------------------
    public function likeToItem()
    {
        return $this->belongsToMany(Item::class, 'likes', 'item_id', 'user_id');
    }

    public function commentToItem()
    {
        return $this->belongsToMany(Item::class, 'comments', 'item_id', 'user_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'user_id', 'id');
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'user_id','id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
}
