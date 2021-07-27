<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@foreach($shoppingCart as $cartItem)
<?php
    if (isset($cartItem)){
        $totalPrice += $cartItem->unitPrice * $cartItem->quantity;
    }
?>
    <tr>
        <form action="/cart/update" method='post'>
            @csrf
            <td>{{$cartItem->id}}</td>
            <td>{{$cartItem->name}}</td>
            <td>{{$cartItem->unitPrice}}</td>
            <td>
                <input type="hidden" name="id" value="{{$cartItem->id}}">
                <input type="number" class="w3-border w3-quarter" name="quantity" min="1" value="{{$cartItem->quantity}}">
            </td>
            <td>{{$cartItem->unitPrice * $cartItem->quantity}}</td>
            <td>
                <button class="w3-button w3-indigo">Update</button>
                <a href="/cart/remove?id={{$cartItem->id}}" onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này khỏi giỏ hàng?')"></a>
            </td>
        </form>
    </tr>
@endforeach
<table>
    <div style="margin-top: 20px">
        <strong>Total price {{$totalPrice}}</strong>
    </div>
</table>
</body>
</html>
