<?php

namespace App\Http\Controllers;

use App\Mail\ReadyOrderEmail;
use App\Models\Order;
use App\Models\User;

class OrderStatusController extends Controller
{
    public function moveToProcess(Order $order)
    {

        $order->update([

            'status_id' => 2,
        ]);
        return back();
    }

    public function moveToReady(Order $order)
    {

        $order->update([

            'status_id' => 3,
        ]);
        $user = User::find($order->user_id);
        \Mail::to($user)->send(new ReadyOrderEmail($user, $order));

        return back();
    }
}
