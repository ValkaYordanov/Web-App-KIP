@extends('layouts.master')
@section('content')


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
                <p><a class="button button3"  href="">Update</a></p>

                </div>

                <div class="row">
                    <p><a class="button button3"  onclick="return confirm('Do you want to delete this product?')" href="{{ route('product.delete', $product->id) }}">Delete</a></p>
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
