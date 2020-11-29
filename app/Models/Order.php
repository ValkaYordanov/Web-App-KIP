<?php

namespace App\Models;

use App\Models\OrderType;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'totalPrice', 'cart', 'date', 'status_id', 'typeOfOrder_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderType()
    {
        return $this->belongsTo(OrderType::class);
    }
}
