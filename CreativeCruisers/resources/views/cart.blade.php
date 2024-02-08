@extends('header')
@section('content')
    <div class="item-details">
        <h2>Item Details</h2>
        <div class="scrolling">
            @if($cartItems->Count() > 0)
            @foreach($cartItems as $item)
            <div class="item">
                <img class="checkout_img"src="products/{{$item->id}}.png" alt="placeholder">
                <p>{{$item->name}} - £{{$item->price}}</p>
                <form method="GET" id="deleteFromCart" action="{{route('cart.remove')}}">
                @csrf
                
                <button class="remove-button">Remove</button>
                <input type="hidden" type="rowId_D" name="rowId" value="{{$item->rowId}}">
                </form>
            </div>
            @endforeach
            @else
                <div>Cart empty.</div>
            @endif
            <!-- <div class="item">
                <img src="https://via.placeholder.com/100x100" alt="placeholder">
                <p>Deck 4 - £45.23</p>
                <button class="remove-button">Remove</button>
            </div>
            <div class="item">
                <img src="https://via.placeholder.com/100x100" alt="placeholder">
                <p>Wheels 5 - £14.56</p>
                <button class="remove-button">Remove</button>
            </div>
            <div class="item">
                <img src="https://via.placeholder.com/100x100" alt="placeholder">
                <p>Truck 2 - £35.54</p>
                <button class="remove-button">Remove</button>
            </div> -->
        </div>
        <div class="total-price">
            <h3>Total:</h3>
            <p>£{{$cartItems->sum('price')}}</p>
        </div>
        <div class = "checkout-btn">
            <a href = "{{ route('checkout.index') }}" class="btn">Checkout</a> 
        </div>
    </div>
@endsection