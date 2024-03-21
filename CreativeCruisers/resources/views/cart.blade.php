@extends('header')
@section('content')
<link rel="stylesheet" href="css/cart.css">
    <div class="cart-container">
        <h2 class="cart-title">Shopping Basket</h2>
        <div class="cart-items">
            @if($cartItems->Count() > 0)
                @foreach($cartItems as $item)
                    <div class="cart-item">
                        <img class="item-image" src="products/{{$item->name}}.jpg" alt="{{$item->name}}">
                        <div class="item-info">
                            <p class="item-name">{{$item->name}}</p>
                            <p class="item-price">£{{$item->price}}</p>
                            <p class="item-qty">{{$item->qty}}</p>
                        </div>
                        <form method="GET" class="remove-form" action="{{route('cart.remove')}}">
                            @csrf
                            <button class="remove-button" type="submit">Remove</button>
                            <input type="hidden" name="rowId" value="{{$item->rowId}}">
                        </form>
                    </div>
                @endforeach
            @else
                <div>Your basket is empty.</div>
            @endif
        </div>
        <div class="cart-total">
            <h3 class="total-title">Total:</h3>
            <p class="total-price">£{{Cart::subtotal()}}</p>
            <a href="{{ route('checkout.index') }}" class="cart-button">Proceed to Checkout</a> 
        </div>
    </div>
@endsection