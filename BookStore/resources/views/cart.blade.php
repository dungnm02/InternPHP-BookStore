<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cart</title>
    <link rel="stylesheet" href="{{ asset('/css/master.css') }}">
</head>
<body>
@extends('layouts.master', ['hasSideBar' => false])
{{--show book list--}}
@section('content')
    <div id="cart-container">
        <h1>Your Cart</h1>
        @foreach($cart as $cartItem)
            @include('components.cart-item', ['cartItem' => $cartItem])
        @endforeach
        <button>Place order</button>
    </div>
@endsection
</body>
</html>

<script>
    "use strict";
    document.addEventListener('DOMContentLoaded', function () {
        let cartInputs = document.getElementsByClassName('cart-quantity-input');
        for (let i = 0; i < cartInputs.length; i++) {
            cartInputs[i].addEventListener('change', function () {
                let quantity = this.value;
                let price = parseInt(this.parentElement.querySelector('#cart-book-prices').innerText);
                this.parentElement.querySelector('#total-price').innerText = price * quantity + 'đ';
                let bookFormatId = this.parentElement.querySelector('input[name="book_format_id"]').value;

                let url = '{{ route('updateCart') }}';
                let data = {
                    book_format_id: bookFormatId,
                    quantity: quantity
                };
                // Send a POST request to the server, so it can update cart in session
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                });
            });
        }
    });
</script>
