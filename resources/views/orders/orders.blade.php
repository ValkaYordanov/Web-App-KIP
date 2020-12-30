@extends('layouts.master')
@section('content')

<style>
table, th, td {
  border: 1px solid black;
width:310px;
height:30px;
vertical-align:center;
}
td {
  text-align: center;

}
</style>
<main>

    <br>
    <br>
    <div class="container" style=" max-width: 1400px">
        <div class="row justify-content-center" >
            <div class="col-sm-12 col-xl-3">
                <div >
                <h1>Waiting list</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Move to</th>

                            </tr>
                        </thead>
                        @foreach($waitingOrders as $order)
                        <tbody>
                            <tr>
                                <td><a class="button button3" href="{{ route('returnProducts', $order) }}">{{ $order->id }}</a></td>
                                <td>{{ $order->user->name }} {{ $order->user->last_name }}</td>
                                <td>
                                    <a  href="{{ route('moveToProcess', $order) }}"> <p><img src="../../images/strike.png" width="30" height="15" alt=""></p></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
            <div class="col-sm-12 col-xl-3">
                <div >
                 <h1>In Process list</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Move to</th>
                            </tr>
                        </thead>
                        @foreach($inProcessOrders as $order)
                        <tbody>
                            <tr>
                                <td><a class="button button3" href="{{ route('returnProducts', $order) }}">{{ $order->id }}</a></td>
                                <td>{{ $order->user->name }} {{ $order->user->last_name }}</td>
                                <td>
                                    <a href="{{ route('moveToReady', $order) }}"> <p><img src="../../images/strike.png" width="30" height="15" alt=""></p></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-xl-3">
                <div >
                 <h1>Ready list</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach($readyOrders as $order)
                        <tbody>
                            <tr>

                                <td><a class="button button3" href="{{ route('returnProducts', $order) }}">{{ $order->id }}</a></td>
                                <td>{{ $order->user->name }} {{ $order->user->last_name }}</td>
                                 <td>
                                    <p><img src="../../images/check.png" width="20" height="20" alt=""></p>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-xl-2" >
                <div >
                 <h1>Products</h1>
                    <table style="width:180px;">
                        <thead>
                            <tr>
                                <th>Products</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allProducts!=null)
                        @foreach($allProducts as $prod)
                            <tr>
                                <td>{{ $prod['item']->name }}</td>
                                <td>{{ $prod['qty'] }}</td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</main>
@endsection
