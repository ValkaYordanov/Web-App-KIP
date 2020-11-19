@extends('layouts.master')
@section('content')


<br>
<br>
<br>
 <div class="container">
        <div class=" justify-content-center">
            @if(Session::has('cart'))

                <div class="row">
                    <div class="col-sm-12 col-xl-10">
                        <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge">{{ $product['qty'] }}</span>
                                <strong> {{ $product['item']['name'] }}</strong>
                                <span class="label label-success"> {{ $product['price'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="">Reduce by 1</a></li>
                                        <li><a href="">Reduce all</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
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
                    <button class="btn btn-success" type="button">Checkout</button>
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
<br>
<br>

@endsection
