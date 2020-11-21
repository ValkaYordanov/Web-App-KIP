@extends('layouts.master')
@section('content')


<br>
<br>
<br>
<main>
    <div class="container">

        @if(Session::has('cart'))
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <div class="column" style="width:20%; height:100px;">
                            <div class="row">
                                <span>Product:  <strong>{{ $product['item']['name'] }}</strong></span>
                            </div>
                            <div class="row">
                                <span>Quantity:  <strong>{{ $product['qty'] }}</strong></span>
                            </div>

                            <div class="row">
                                <span class="label label-success">Price:  <strong>{{ $product['price'] }}</strong></span>
                            </div>
                        </div>
                        <div class="column" style="width:20%; height:100px;">

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('reduceOne', $product['item']['id']) }}">Reduce by 1</a></li>
                                    <li><a href="{{ route('removeProduct', $product['item']['id']) }}">Reduce all</a></li>
                                </ul>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>


            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-12 col-xl-10">
                    <strong >Total:{{$totalPrice}}</strong>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xl-10">
                    <a class="btn btn-success" href="{{ route('finishOrder') }}" type="button">Finish Order</a>
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
</main>
<br>
<br>
<br>
<br>

@endsection
