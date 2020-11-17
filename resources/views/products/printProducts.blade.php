@extends('layouts.master')
@section('content')
<style>
#myDiv {

    font-size: 20px;
    height: 50px;
    overflow: hidden;
    width: 650px;
    white-space: nowrap;
    text-overflow: ellipsis;
}
input{
			height:40px;
      width: 70px;
      text-align: center;
      font-size: 23px;
			border:1px solid #ddd;
			border-radius:4px;
      display: inline-block;
      vertical-align: middle;
}

</style>

<main>
    <br>
    <br>
    @foreach($products as $product)
        <div class="container">
            <br>
            <div class="card">
                <div class="row">
                    <div style="width: 15%;" class="column">
                        <img src="{{ $product->pic_path }}" width="150" height="150">
                    </div>
                    <div  style="width: 60%;" class="column">
                        <h1>{{ $product->name }}</h1>
                        <p class="price">Price: {{ $product->price }}</p>
                        <p class="price">Stock :{{ $product->stock }}</p>
                        <p  id="myDiv">{{ $product->description }}</p>
                    </div>
                    <div style="width: 25%;"   class="column-button">
                        <div class="row">
                            <div class="number-input">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                                <input class="quantity" min="0" name="quantity" value="0" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <p><a class="button button3"  href="">Add</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<br>
<br>

</main>

@endsection
