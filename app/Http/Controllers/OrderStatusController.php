<?php

namespace App\Http\Controllers;

use App\Models\Order;

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
        return back();
    }
}
