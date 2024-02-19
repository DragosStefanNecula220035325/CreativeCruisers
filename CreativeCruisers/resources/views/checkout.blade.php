@extends('header')
@section('content')
<link rel="stylesheet" href="css/checkout.css">

<div class="checkout-container">
    <div class="delivery-info">
        <h2>Delivery Information</h2>
        <form id="checkout-form" method="post" action="{{ route('checkout.post') }}">
            @csrf
            <label for="country">Country:</label>
            <select id="country" name="country">
                    <option value="uk">United Kingdom</option>
                    <option value="usa">United States of America</option>
                    <option value="germany">Germany</option>
                    <option value="france">France</option>
                    <option value="japan">Japan</option>
                    <option value="italy">Italy</option>
                    <option value="canada">Canada</option>
                </select>

            <label for="address">Delivery Address:</label>
            <input type="text" id="address" name="address">

            <label for="delivery-options">Delivery Options:</label>
            <select id="delivery-options" name="delivery-options">
                    <option value="special">Royal Mail Special Delivery Guaranteed by 9am</option>
                    <option value="1st">Royal Mail 1st Class</option>
                    <option value="2nd">Royal Mail 2nd Class</option>
                </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="payment-options">Payment Options:</label>
            <select id="payment-options" name="payment-options" onchange="creditSelect()">
                <option value="paypal">PayPal</option>    
                <option value="credit">Credit and Debit card</option>    
                <option value="bnpl">Buy now, pay later</option>            
            </select>

        <div id="credit-card-details" style="display: none;">
            <label for="card-number">Card Number:</label>
            <input type="text" id="card-number" name="card-number" placeholder="3688 8413 4517 6666"> 

            <label for="card-expiration-date">Expiration Date:</label>
            <input type="text" id="card-expiration-date" name="card-expiration-date" placeholder="MM/YY">

            <label for="card-cvv">CVV:</label>
            <input type="text" id="card-cvv" name="card-cvv" placeholder="123">
        </div>

            <a href="{{ route('checkout.post') }}" class="cart-button">Complete Payment</a>
            <button type = "submit">{{ __('Complete Payment') }}</button>
        </form>
    </div>

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
    </div>
</div>
<script>
        function Payment() {
            alert('Payment successful!');
        }
</script>
<script>
    function creditSelect() {
        var paymentOption = document.getElementById('payment-options').value;
        var creditCardDetails = document.getElementById('credit-card-details');
        
        if (paymentOption === 'credit') {
            creditCardDetails.style.display = 'block';
        } else {
            creditCardDetails.style.display = 'none';
        }
    }
</script>
@endsection