<?php

namespace Tests\Unit;

use App\Http\Controllers\OrderStatusController;
use App\Models\Order;
use Tests\TestCase;

class OrderStatusTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTheMoveToReadyMethod()
    {
        $order = Order::where('status_id', 2)->get()->first();

        $prodController = new OrderStatusController();

        $prodController->moveToReady($order);

        $this->assertEquals(3, $order->status_id);
    }
}
