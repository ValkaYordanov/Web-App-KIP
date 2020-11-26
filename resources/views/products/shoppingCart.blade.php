@extends('layouts.master')
@section('content')


<br>
<br>
<br>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-10">
                @if(Session::has('cart'))
                    @foreach($products as $product)
                        <div class="container">
                            <div class="card">
                                <div class="row">
                                    <div style="width: 30%;" class="column">
                                        <p>Product:  <strong>{{ $product['item']['name'] }}</strong></p>
                                        <p>Quantity:  <strong>{{ $product['qty'] }}</strong></p>
                                        <p class="label label-success">Price for 1:  <strong>{{  number_format($product['item']['price'],2) }}</strong></p>
                                        <p class="label label-success">Price:  <strong>{{  number_format($product['price'],2) }}</strong></p>
                                    </div>

                                    <div class="column" style="width:35%; height:100px;  text-align: center;">
                                        <a href="{{ route('reduceOne', $product['item']['id']) }}">
                                            <p><img src="images/minus1.png" width="30" height="30" alt=""></p>
                                        </a>
                                    </div>

                                    <div class="column" style="width:35%; height:100px;  text-align: center;">
                                        <a href="{{ route('removeProduct', $product['item']['id']) }}">
                                            <p><img src="images/trash-can.png" width="30" height="30" alt=""></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach

                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-xl-10">
                        <strong >Total: {{ number_format($totalPrice,2) }}</strong>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-xl-10">
                        @if(Auth::check())
                        <a class="btn btn-success" href="{{ route('finishOrder') }}" type="button">Finish Order</a>
                        @else
                        <p>To finish order you need to log in! <a method="GET" href="{{ route('login') }}" class="button button3">
                        <span class="icon"></span>Login</a></p>
                        @endif
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-sm-12 col-xl-10">
                        <h2>No Items in Cart!</h2>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>

</main>
<br>
<br>
<br>
<br>

@endsection
