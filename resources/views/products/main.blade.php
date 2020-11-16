@extends('layouts.master')
@section('content')



<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-10">
            <br>
            <br>
             <div class="row">
                 <div style="width: 30%;" class="column">
                    <a href="{{ route('meat') }}">
                        <img  src="images/meat.jpg" width="260" height="200">
                    </a>
                </div>
                <div style="width: 30%;" class="column">
                    <a href="{{ route('allProducts') }}">
                        <img src="images/salad.jpg" width="260" height="200">
                    </a>
                </div>
                 <div style="width: 30%;" class="column">
                    <a href="{{ route('allProducts') }}">
                        <img src="images/potatoes.jpg" width="260" height="200">
                    </a>
                </div>

            </div>
            <br>
            <br>
            <br>
            <div class="row">
            <div style="width: 30%;"  class="column" >
            </div>
            <div style="width: 30%;"  class="column" >
                <a href="{{ route('allProducts') }}">
                    <img href="" src="images/drink.jpeg" width="260" height="200">
                </a>
            </div>
            <div style="width: 30%;"  class="column" >
            </div>
            </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
</main>

@endsection
