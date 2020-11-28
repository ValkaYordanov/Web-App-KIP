<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Auth;
use Session;

class OrderController extends Controller
{

    public function showOrders()
    {
        $orders = Order::all();
        return view('orders.orders', compact('orders'));
    }

    public function store()
    {

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = Order::create([

            'user_id' => Auth::user()->id,
            'cart' => serialize($cart),
            'totalPrice' => $cart->totalPrice,
            'date' => date('Y-m-d'),

        ]);

        Session::forget('cart');
        return redirect(route('home'));
    }

}
