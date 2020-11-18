<?php

namespace App\Http\Controllers;

use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderLineController extends Controller
{
    public function addOrderLine(Request $request, Product $product)
    {

        $orderLine = OrderLine::create([

            'product_id' => $product->id,
            'order_id' => 0,
            'quantity' => $request->input('quantity'),
            'price' => $product->price,

        ]);
        var_dump($orderLine);
        die();

        return redirect(route('allProducts'));

    }
}
