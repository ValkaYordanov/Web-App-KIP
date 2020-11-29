@extends('layouts.master')
@section('content')

<style>
table, th, td {
  border: 1px solid black;
}
</style>
<main>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-7">
                <div >
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->status_id }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
            <div class="col-sm-12 col-xl-5">



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
