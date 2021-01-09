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
                                    <div style="width: 25%;" class="column">
                                        <p>Product:  <strong>{{ $product['item']['name'] }}</strong></p>
                                        <p>Quantity:  <strong>{{ $product['qty'] }}</strong></p>
                                        <p class="label label-success">Price for 1:  <strong>{{  number_format($product['item']['price'],2) }}</strong></p>
                                        <p class="label label-success">Price:  <strong>{{  number_format($product['price'],2) }}</strong></p>
                                    </div>

                                    <div class="column" style="width:25%; height:100px;  text-align: center;">
                                        <a href="{{ route('reduceOne', $product['item']['id']) }}">
                                            <p><img src="images/minusOne.png" width="30" height="30" alt=""></p>
                                        </a>
                                    </div>
                                      <div class="column" style="width:25%; height:100px;  text-align: center;">
                                        <a href="{{ route('addToCart', $product['item']['id']) }}">
                                            <p><img src="images/plusOne.png" width="30" height="30" alt=""></p>
                                        </a>
                                    </div>

                                    <div class="column" style="width:25%; height:100px;  text-align: center;">
                                        <a href="{{ route('removeProduct', $product['item']['id']) }}">
                                            <p><img src="images/trash-can.png" width="30" height="30" alt=""></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>



                        </div>
                        <br>
                    @endforeach
                     <form method="POST"  action="{{ route('finishOrder') }}" >
                        @csrf
                            <div class="row">
                                <div class="col-sm-12 col-xl-10">
                                        <label for="typeOfOrder">How you will recieve the order:</label>
                                        <select name="typeOfOrder" class="inputClassProd" >
                                        <option></option>
                                            @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{$type->nameOfTheType}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                                @if (session::has('errors'))
                                <p style="color:red;">  {{session('errors')->first('orderTypeErr')}} </p>
                                @endif

                            <br><br>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-12 col-xl-10">
                                    <strong >Total: {{ number_format($totalPrice,2) }}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-xl-10">
                                    @if(Auth::check())
                                    <button><a class="btn btn-success"  type="button">Finish Order</a></button>
                                    @else
                                    <p>To finish order you need to log in! <a method="GET" href="{{ route('login') }}" class="button button3">
                                    <span class="icon"></span>Login</a></p>
                                    @endif
                                </div>
                            </div>
                    </form>
                @else
                <div class="row">
                    <div class="col-sm-12 col-xl-10">
                        <h2>No Items in Cart!</h2>
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
