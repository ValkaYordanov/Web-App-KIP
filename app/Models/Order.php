<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'totalPrice', 'cart', 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
