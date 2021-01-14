@extends('layouts.master')
@section('content')



<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-10">
            <br>
            <br>
            <br>
            <br>
             <div class="row">
                 <div style="width: 30%;text-align: center;" class="column">
                    <a href="{{ route('meat') }}">
                        <img  src="images/meat.jpg" width="260" height="200">
                    <p class="food-title">Meat</p>
                    </a>
                </div>
                <div style="width: 30%;text-align: center;" class="column">
                    <a href="{{ route('salads') }}">
                        <img src="images/salad.jpg" width="260" height="200">
                    <p class="food-title">Salads</p>
                    </a>
                </div>
                 <div style="width: 30%;text-align: center;" class="column">
                    <a href="{{ route('potatoes') }}">
                        <img src="images/potatoes.jpg" width="260" height="200">
                    <p class="food-title">Potatoes</p>
                    </a>
                </div>

            </div>
            <br>
            <br>
            <br>
            <div class="row">
            <div style="width: 30%;"  class="column" >
            </div>
            <div style="width: 30%;text-align: center;"  class="column" >
                <a href="{{ route('drinks') }}">
                    <img href="" src="images/drink.jpeg" width="260" height="200">
                    <p class="food-title">Drinks</p>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</main>

@endsection
