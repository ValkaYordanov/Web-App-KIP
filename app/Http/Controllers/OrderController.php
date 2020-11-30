<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderType;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{

    public function showOrders()
    {
        $waitingOrders = Order::where('status_id', 1)->get();
        $inProcessOrders = Order::where('status_id', 2)->get();
        $readyOrders = Order::where('status_id', 3)->get();

        return view('orders.orders', compact('waitingOrders', 'inProcessOrders', 'readyOrders'));
    }

    public function store(Request $request, OrderType $typeOfOrder)
    {

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $statusOrder = OrderStatus::find(1);

        $order = Order::create([

            'user_id' => Auth::user()->id,
            'cart' => serialize($cart),
            'totalPrice' => $cart->totalPrice,
            'date' => date('Y-m-d'),
            'status_id' => $statusOrder->id,
            'typeOfOrder_id' => $request->typeOfOrder,

        ]);
        Session::forget('cart');
        return redirect(route('home'));
    }

}
