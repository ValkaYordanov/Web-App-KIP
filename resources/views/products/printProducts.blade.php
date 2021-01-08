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
                        @if($product->stock<=0)
                            <p class="price">Out of Stock</p>
                        @else
                            <p class="price">Stock: {{ $product->stock }}</p>
                        @endif
                        <p  id="myDiv">{{ $product->description }}</p>
                    </div>
                    <div style="width: 35%; "   class="column-button">
                        <div class="row">
                            @if($product->stock<=0)
                                <p>Out of Stock</p>
                            @else
                            <p><a role="button" href="{{ route('addToCart', $product->id) }}" style="width:100px;height:45px;vertical-align:middle;text-align: center;line-height: 40px;  font-size: 22px" class="button button3" >Add</a></p>
                            @endif
                        </div>
                            @if(Auth::check())
                            @if(Auth::user()->type =="admin")
                            <div class="row">
                                <p><a class="button button3" style="width:120px;height:45px;vertical-align:middle;text-align: center;line-height: 40px;  font-size: 22px" href="{{ route('showUpdateProduct', $product->id) }}">Update</a></p>
                            </div>

                            <div class="row">
                                <p><a class="button button3" style="width:120px;height:45px;vertical-align:middle;text-align: center;line-height: 40px;  font-size: 22px"  onclick="return confirm('Do you want to delete this product?')" href="{{ route('product.delete', $product->id) }}">Delete</a></p>
                            </div>
                            @endif
                            @endif

                    </div>
                </div>

            </div>
        </div>
    @endforeach
<br>
<br>

</main>

@endsection
