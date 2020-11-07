@extends('layouts.master')
@section('content')



<main>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-xl-10">
                    <a href="{{ route('addProduct') }}" class="button button3">Add new product</a>
                </div>
            </div>
    </div>
</main>

@endsection
