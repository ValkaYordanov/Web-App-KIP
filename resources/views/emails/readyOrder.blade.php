<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
@php
if($order->typeOfOrder_id == 1)
$type="for home";
else
$type="to be picked up";
@endphp


<h1>Hi {{ $user->name }}, </h1>
<p>Your order is ready {{$type}}!
<br>
The total price of the order is {{$order->totalPrice}} DKK !
</p>


</body>

</html>
